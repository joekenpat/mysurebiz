<?php

namespace App\Http\Controllers\ebook;

use App\Models\Ebook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminEbookController extends Controller {
	public function Manage( Request $request ) {
		$request->validate( [
			'id'     => 'required|exists:ebooks,id',
			'action' => 'required|in:1,0',
		] );

		Ebook::where( "id", $request->id )->update( [
			"status" => $request->action
		] );

		return response()->json( [ "message" => "successful" ] );
	}

	public function GetAll( Request $request ) {

		if ( $request->isMethod( 'post' ) ) {
			$searchValues = preg_split( '/\s+/', $request->searchQuery, - 1, PREG_SPLIT_NO_EMPTY );
			$ebooks       = Ebook::where( function ( $q ) use ( $searchValues ) {
				foreach ( $searchValues as $value ) {
					$q->orWhere( 'title', 'like', "%{$value}%" );
				}
			} )->paginate( 20 );
			$title = 'Search results for "'.$request->searchQuery.'"';
		}else{
			$ebooks = Ebook::paginate( 20 );
			$title = "Ebooks";
		}

		return view( 'ebook.admin.ebooks' )->with( [
			"ebooks" => $ebooks,
			"title"  => $title
		] );
	}
}
