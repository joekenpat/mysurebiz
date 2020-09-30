<?php

namespace App\Http\Controllers\users;

use App\General\CourseLesson;
use App\General\ManagePayment;
use App\Models\Payment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use KingFlamez\Rave\Facades\Rave;

use Unicodeveloper\Paystack\Facades\Paystack;

class RavePaymentController extends Controller
{
	public function index()
	{
		return view('users.payment',[
			'amount' => Auth::user()->pennywise,
//			'isEmployeeFirst' => Auth::user()->isEmployeeFirst()
		]);
	}

	public function initialize(Request $request)
	{
		//Check employees without pennywise
//		$isEmployeeFirst = Auth::user()->isEmployeeFirst();
//		$amountRule = $isEmployeeFirst ? 'required' : '';

		$request->validate([
//			'amount' => $amountRule.'|numeric|min:200',
			'period' => 'required|numeric|min:1',
			'isBonus' => 'nullable|in:true'
		]);

//		if($isEmployeeFirst){
//			$amount = $request->amount * $request->period;
			Session::put('firstEmployeeAmount', $request->amount);
//		}else{
			$amount = Auth::user()->pennywise * $request->period;
//		}
		//Check if amount is 10M and above
		if($amount > 9999999){
			return redirect()->back()->withErrors(
				['You can only keep less than 10 million per transaction']
			);
		}

		//Check if user has completed his/her keep
		$result = CourseLesson::daysKeepReport();
		$noOfDaysLeft = $result['noOfDays'] - $result['noOfdaysPayed'];
		if($result['noOfDays']){
			if($result['noOfdaysPayed'] >= $result['noOfDays']){
				return redirect()->back()->withErrors(
					['You have completed your total number of token keeps. Thank you.']
				);
			}

			//Prevent keeping more than the required number of days
			if($request->period > $noOfDaysLeft){
				return redirect()->back()->withErrors(
					["Sorry ". Auth::user()->first_name .", You only have a period of {$noOfDaysLeft} left to keep tokens."]
				);
			}
		}

		//Check if user wants to keep from referral bonus
		if($request->isBonus){
			$response = ManagePayment::HandleKeepFromBonus($amount);
			if(!$response){
				ManagePayment::flashSession(
					"Payment Unsuccessful",
					"Your probably do not have enough referral bonus balance in your account."
				);
			}
			return redirect()->route('paymentresponse');
		}

		//Continue with gateway payment if not from ref bonus

		$request->amount = $amount;
		$request->email = Auth::user()->email;
		$request->payment_method = 'both';
		$request->description = 'Training Payment';
		$request->phonenumber = Auth::user()->phone;
		$request->title = 'Training Payment';
		$request->currency = 'NGN';
		$request->ref = Paystack::genTranxRef();

		Rave::initialize(route('callback'));
	}

	public function PaymentReport()
	{
		//Get all lessons of current user in all courses
		$result = CourseLesson::daysKeepReport();

		$payments = Payment::where('user_id', Auth::id())
		                   ->select('reference', 'created_at', 'amount')
		                   ->paginate(10);
		return view('users.payment-report', [
				'payments' => $payments,
				'totalPayments' => $result['totalPayments'],
				'noOfDays' => $result['noOfDays'],
				'noOfdaysPayed' => $result['noOfdaysPayed']
			]
		);
	}

	/**
	 * Obtain Paystack payment information
	 */
	public function callback(Request $request)
	{

		$paymentDetails = Rave::verifyTransaction(request()->txref);

		if(!$paymentDetails){
			ManagePayment::flashSession(
				"Payment Unsuccessful",
				"Please try again or contact Support"
			);
			return redirect()->route('paymentresponse');
		}
		if(!$paymentDetails->data){
			ManagePayment::flashSession(
				"Payment Unsuccessful",
				$paymentDetails['message']
			);
			return redirect()->route('paymentresponse');

		}
		if(!($paymentDetails->data->status == 'successful')){
			ManagePayment::flashSession(
				"Payment Unsuccessful",
				$paymentDetails->data->gateway_response
			);
			return redirect()->route('paymentresponse');
		}

		//Check if reference code exists and has been used
		$referenceUserId = User::where('email', $paymentDetails->data->custemail)
		                       ->first();
		$referenceUserId = $referenceUserId ? $referenceUserId->id : null;

		$isReferenceExists = Payment::where([
			['user_id', $referenceUserId],
			['reference', $paymentDetails->data->txref]
		])->count();

		if($isReferenceExists){
			ManagePayment::flashSession(
				"Payment Report",
				"This transaction has already been made"
			);
			return redirect()->route('paymentresponse');
		}
		//Update payment
		$isUpdated = ManagePayment::UpdatePayment(null, $paymentDetails);
		if(!$isUpdated){
			ManagePayment::flashSession(
				"Payment Unsuccessful",
				"An error occured while trying to process your request. Please try again"
			);
		}
		return redirect()->route('paymentresponse');
	}

}
