<?php

namespace App\Http\Controllers\users;

use App\General\CourseLesson;
use App\General\CourseLessonOperator;
use App\General\ManagePayment;
use App\Models\Lesson;
use App\Models\Payment;
use App\User;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Paystack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller {
	public function index() {
		return view( 'users.payment', [
			'amount' => Auth::user()->pennywise,
//            'isEmployeeFirst' => Auth::user()->isEmployeeFirst()
		] );
	}

	public function PaymentReport( Request $request, $user_id = null ) {
		//Get all lessons of current user in all courses
		$userId = Auth::user()->role === "Admin" ? $user_id : Auth::id();

		$user = User::where( "id", $userId )->first();

		if ( ! $user ) {
			abort( 404, 'No user found' );
		}

		$result = CourseLesson::daysKeepReport( $user );

		$payments = Payment::where( 'user_id', $userId )
		                   ->select( 'reference', 'created_at', 'amount' )
		                   ->paginate( 10 );

		return view( 'users.payment-report', [
				'payments'      => $payments,
				'totalPayments' => $result['totalPayments'],
				'noOfDays'      => $result['noOfDays'],
				'noOfdaysPayed' => $result['noOfdaysPayed'],
				'userEmail'     => $user->email,
				'userId'        => $user->id
			]
		);
	}

	/**
	 * Redirect the User to Paystack Payment Page
	 * @return Url
	 */
	public function redirectToGateway( Request $request ) {
//	    return redirect()->back()->withErrors(
//		    ['Our payment terminal will soon be activated. Kindly exercise some patience.']
//	    );
		//Check employees without pennywise
//        $isEmployeeFirst = Auth::user()->isEmployeeFirst();
//        $amountRule = $isEmployeeFirst ? 'required' : '';

		$request->validate( [
//            'amount' => $amountRule.'|numeric|min:200',
			'period'  => 'required|numeric|min:1',
			'isBonus' => 'nullable|in:true'
		] );

//        if($isEmployeeFirst){
//            $amount = $request->amount * $request->period;
//            Session::put('firstEmployeeAmount', $request->amount);
//        }else{
		$amount = Auth::user()->pennywise * $request->period;
//        }

		//Check if amount is 10M and above
		if ( $amount > 9999999 ) {
			return redirect()->back()->withErrors(
				[ 'You can only keep less than 10 million per transaction' ]
			);
		}

		//Check if user has completed his/her keep
		$result       = CourseLesson::daysKeepReport();
		$noOfDaysLeft = $result['noOfDays'] - $result['noOfdaysPayed'];
		if ( $result['noOfDays'] ) {
			if ( $result['noOfdaysPayed'] >= $result['noOfDays'] ) {
				return redirect()->back()->withErrors(
					[ 'You have completed your total number of token keeps. Thank you.' ]
				);
			}

			//Prevent keeping more than the required number of days
			if ( $request->period > $noOfDaysLeft ) {
				return redirect()->back()->withErrors(
					[ "Sorry " . Auth::user()->first_name . ", You only have a period of {$noOfDaysLeft} left to keep tokens." ]
				);
			}
		}

		//Check if user wants to keep from referral bonus
		if ( $request->isBonus ) {
			$response = ManagePayment::HandleKeepFromBonus( $amount );
			if ( ! $response ) {
				ManagePayment::flashSession(
					"Payment Unsuccessful",
					"You probably do not have enough referral bonus balance in your account."
				);
			}

			return redirect()->route( 'paymentresponse' );
		}

		//Continue with gateway payment if not from ref bonus

		$request->amount    = $amount * 100;
		$request->email     = Auth::user()->email;
		$request->reference = Paystack::genTranxRef();
		$request->key       = config( 'paystack.secretKey' );

		return Paystack::getAuthorizationUrl()->redirectNow();
	}

	/**
	 * Obtain Paystack payment information
	 */
	public function handleGatewayCallback( Request $request ) {
		return redirect()->back()->withErrors(
			[ 'Our payment terminal will soon be activated. Kindly exercise some patience.' ]
		);
		$validator = Validator::make( $request->all(), [
			'reference' => 'required',
			'trxref'    => 'required'
		] );
		if ( $validator->fails() ) {
			return redirect()->route( 'usersdashboard' );
		}
		$paymentDetails  = Paystack::getPaymentData();
		$payment         = new \stdClass();
		$payment->amount = null;
		if ( ! $paymentDetails ) {
			ManagePayment::flashSession(
				"Payment Unsuccessful",
				"Please try again or contact Support"
			);

			return redirect()->route( 'paymentresponse' );
		}
		if ( ! $paymentDetails['data'] ) {
			ManagePayment::flashSession(
				"Payment Unsuccessful",
				$paymentDetails['message']
			);

			return redirect()->route( 'paymentresponse' );

		}
		if ( ! ( $paymentDetails['data']['status'] == 'success' ) ) {
			ManagePayment::flashSession(
				"Payment Unsuccessful",
				$paymentDetails['data']['gateway_response']
			);

			return redirect()->route( 'paymentresponse' );
		}
		// the transaction was successful, you can deliver value
		/*
		@ also remember that if this was a card transaction, you can store the
		@ card authorization to enable you charge the customer subsequently.
		@ The card authorization is in:
		@ $result['data']['authorization']['authorization_code'];
		@ PS: Store the authorization with this email address used for this transaction.
		@ The authorization will only work with this particular email.
		@ If the user changes his email on your system, it will be unusable
		*/

		//Check if reference code exists and has been used
		$referenceUserId = User::where( 'email', $paymentDetails['data']['customer']['email'] )
		                       ->first();
		$referenceUserId = $referenceUserId ? $referenceUserId->id : null;

		$isReferenceExists = Payment::where( [
			[ 'user_id', $referenceUserId ],
			[ 'reference', $paymentDetails['data']['reference'] ]
		] )->count();

		if ( $isReferenceExists ) {
			ManagePayment::flashSession(
				"Payment Report",
				"This transaction has already been made"
			);

			return redirect()->route( 'paymentresponse' );
		}
		//Update payment
		$isUpdated = ManagePayment::UpdatePayment( null, $paymentDetails );
		if ( ! $isUpdated ) {
			ManagePayment::flashSession(
				"Payment Unsuccessful",
				"An error occured while trying to process your request. Please try again"
			);
		}

		return redirect()->route( 'paymentresponse' );
	}

}
