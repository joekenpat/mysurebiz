<?php

namespace App\Http\Controllers\ebook;

use App\Mail\SendEbook;
use App\Models\Ebook;
use App\Models\EbookSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use KingFlamez\Rave\Facades\Rave;
use Unicodeveloper\Paystack\Facades\Paystack;

class EbookSalesController extends Controller {
	public function Initialize( Request $request ) {
		$request->validate( [
			'ebook_id' => 'required|exists:ebooks,id',
			'name'     => 'required',
			'email'    => 'required|email',
		] );

		$ebook = Ebook::find( $request->ebook_id );
		$ref   = Paystack::genTranxRef();

		EbookSale::create( [
			"ref"      => $ref,
			"ebook_id" => $request->ebook_id,
			"email"    => $request->email,
			"name"     => $request->name,
			"price"    => $ebook->price
		] );

		$request->amount         = $ebook->price;
		$request->payment_method = 'both';
		$request->description    = 'Ebook Payment';
		$request->title          = 'Ebook Payment';
		$request->currency       = 'NGN';
		$request->ref            = $ref;

		Rave::initialize( route( 'ebook-callback' ) );
	}

	public function Callback( Request $request ) {

		$paymentDetails = Rave::verifyTransaction( request()->txref );

		if(!isset($paymentDetails->data->txref)){
			Session::flash( 'title', "Payment Failed" );
			Session::flash( 'message', "Not Successful" );
			return redirect()->route( 'ebook-payment-response' );
		}
		$ebookSaleQuery = EbookSale::where( "ref", $paymentDetails->data->txref );
		$ebookSale      = $ebookSaleQuery->first();

		$ebookId = $ebookSale ? $ebookSale->ebook_id : null;
		Session::flash( 'ebookId', $ebookId );

		if ( ! ( $paymentDetails->data->status == 'successful' ) ) {
			Session::flash( 'title', "Payment Failed" );
			Session::flash( 'message', "Not Successful" );

			return redirect()->route( 'ebook-payment-response' );
		}

		/**
		 * Check if payment already taken care of
		 */

		if ( $ebookSaleQuery->where( 'status', 1 )->exists() ) {
			Session::flash( 'title', "Payment Failed" );
			Session::flash( 'message', "Payment Failed" );

			return redirect()->route( 'ebook-payment-response' );
		}

		$ebookSale->status = 1;
		$ebookSale->save();

		Mail::to( $ebookSale->email )->send(
			new SendEbook( $ebookSale )
		);

		Session::flash( 'title', "Payment Successful" );
		Session::flash( 'message', "Successful" );

		return redirect()->route( 'ebook-payment-response' );
	}

	public function GetAll( Request $request ) {
		$title = "Ebook Sales";

		if ( $request->isMethod( 'post' ) ) {
			$request->validate( [
				"title" => "required"
			] );
			$title = "Search for '" . $request->title . "'";
		}

		$query = EbookSale::leftJoin(
			'ebooks as e', 'e.id', 'ebook_sales.ebook_id'
		)->where( 'ebook_sales.status', 1 )
		                  ->when( $request->isMethod( 'post' ),
			                  function ( $q ) use ( $request ) {
				                  $q->where( 'e.title', "LIKE", "%" . $request->title . "%" );
			                  } )->select( 'ebook_sales.*', 'e.title' );

		$sales = $query->paginate( 20 );
		$sum   = $query->sum( 'ebook_sales.price' );

		return view( 'ebook.admin.sales' )->with( [
			'sales' => $sales,
			"sum"   => $sum,
			"title" => $title
		] );
	}
}
