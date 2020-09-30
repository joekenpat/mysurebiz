<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 1/9/20
 * Time: 12:16 PM
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\Request;

class ImageHelper {

	public static function GetImage( $file ) {
		if ( ! Storage::exists( $file ) ) {
			abort( '404' );
		}

		$path     = storage_path( 'app' ) . '/' . $file;
		$type     = Storage::mimeType( $file );
		$headers  = array( 'Content-Type' => $type );
		$response = new BinaryFileResponse( $path, 200, $headers );

		return $response;
	}

	public static function FormatImageUrl( $path ) {
		return trim(env( "APP_URL" ), "/") .'/' . $path;
	}

	public static function UploadFile(
		$imageObj, $path, Request $request, $request_name, $disk = 'local'
	)
	{
		$fileName = urlencode($imageObj->getClientOriginalName());

		$i = 0;
		do {
			$uniqueFileName = ( $i === 0 ) ? $fileName : $i . '_' . $fileName;
			$exists         = Storage::disk( $disk )->exists( $path . '/' . $uniqueFileName );
			$i              += 1;
		} while ( $exists );

		$imagePath = $request->file( $request_name )->storeAs(
			$path, $uniqueFileName, $disk
		);

		return $imagePath;
	}
}