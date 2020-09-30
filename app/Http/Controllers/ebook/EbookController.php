<?php

namespace App\Http\Controllers\ebook;

use App\Helpers\ImageHelper;
use App\Mail\SendEbook;
use App\Models\Ebook;
use App\Models\EbookSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller {

	public function GetAll( Request $request ) {

		$ebooks = $this->Query()->where( "status", 1 )->paginate( 20 );

		return view( 'ebook.ebooks' )->with( [
			"ebooks" => $ebooks
		] );
	}

	private function Query() {
		return Ebook::when( Auth::check() && Auth::user()->role !== "Admin", function ( $q ) {
			$q->where( 'users', 1 );
		} )->when( ! Auth::check(), function ( $q ) {
			$q->where( 'non_users', 1 );
		} );
	}

	public function Get( Request $request, $ebook_id ) {

		$ebook = $this->Query()->when( ! ( Auth::check() && Auth::user()->role === "Admin" ),
			function ( $q ) {
				$q->where( 'status', 1 );
			} )->where( [
			'id' => $ebook_id
		] )->first();

		if ( ! $ebook ) {
			abort( 404 );
		}

		return view( 'ebook.ebook' )->with( [ "ebook" => $ebook ] );
	}

	public function Checkout( Request $request, $ebook_id ) {

		$ebook = Ebook::where( [
			'id'     => $ebook_id,
			'status' => 1
		] )->first();

		if ( ! $ebook ) {
			abort( 404 );
		}

		return view( 'ebook.checkout' )->with( [ "ebook" => $ebook ] );
	}

	private $ebookCoverPath = "ebook_cover_images";

	private $ebookPath = "ebooks";

	public function Edit( Request $request, $ebook_id ) {
		$ebook = Ebook::find( $ebook_id );

		if ( ! $ebook ) {
			abort( 404 );
		}
		if ( $request->isMethod( "get" ) ) {
			return view( 'ebook.admin.edit' )->with( [ "ebook" => $ebook ] );
		}

		$request->validate( array_merge( $this->validateArr, [
			'ebook' => 'file'
		] ) );

		$ebook = $this->handleFile( $request, true, $ebook );

		$ebook->title       = $request->title;
		$ebook->description = $request->description;
		$ebook->price       = $request->price;
		$ebook->users       = $request->users;
		$ebook->non_users   = $request->non_users;
		$ebook->save();

		return response()->json( [ "message" => "Successful" ] );
	}

	private $validateArr = [
		'title'             => 'required',
		'ebook_cover_image' => 'image',
		'price'             => 'required|integer|gt:0',
		'description'       => 'required',
		'users'             => "required_without:non_users",
		'non_users'         => "required_without:users",
	];

	private function handleFile(
		Request $request, $edit = false, $ebook = null
	) {
		$ebook = $ebook ?? new \stdClass();

		if ( $request->hasFile( 'ebook_cover_image' ) ) {
			if ( $edit && $ebook->cover_image ) {
				Storage::delete( $ebook->cover_image );
			}
			$ebook->cover_image = ImageHelper::UploadFile(
				$request->ebook_cover_image, $this->ebookCoverPath,
				$request, 'ebook_cover_image'
			);
		}

		if ( $request->hasFile( 'ebook' ) ) {
			if ( $edit && $ebook->ebook ) {
				Storage::delete( $ebook->ebook );
			}
			$ebook->ebook = ImageHelper::UploadFile(
				$request->ebook, $this->ebookPath,
				$request, 'ebook'
			);
		}

		return $ebook;
	}

	public function Create( Request $request ) {

		$request->validate( array_merge( $this->validateArr, [
			'ebook' => 'required|file'
		] ) );

		$ebook = $this->handleFile( $request );

		Ebook::create( [
			'title'       => $request->title,
			'cover_image' => isset( $ebook->cover_image ) ? $ebook->cover_image : null,
			'price'       => $request->price,
			'description' => $request->description,
			'ebook'       => $ebook->ebook,
			'users'       => $request->users,
			'non_users'   => $request->non_users,
		] );

		return redirect()->back()->with( 'message', 'Ebook created successfully.' );
	}

	public function GetCreate( Request $request ) {
		return view( 'ebook.admin.create' );
	}

	public function GetCoverImage( Request $request, $file_name ) {

		$file = $this->ebookCoverPath . '/' . $file_name;

		return ImageHelper::GetImage( $file );
	}

	public function Resend( Request $request, $ebook_id ) {
		if ( $request->isMethod( "post" ) ) {
			$request->validate( [
				"ebook_id" => "required|exists:ebooks,id",
				"email"    => "required|email"
			] );

			$ebookSale = EbookSale::where( [
				"ebook_id" => $request->ebook_id,
				"email"    => trim( $request->email ),
				"status"   => 1
			] )->first();

			if ( $ebookSale ) {
				Mail::to( $ebookSale->email )->send(
					new SendEbook( $ebookSale, true )
				);
			}

			return view( 'ebook.resend_response' );
		}

		$ebook = Ebook::where( [
			'id'     => $ebook_id,
			'status' => 1
		] )->first();

		if ( ! $ebook ) {
			abort( 404 );
		}

		return view( 'ebook.resend' )
			->with( [ "ebook" => $ebook ] );
	}
}
