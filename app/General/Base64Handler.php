<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 3/15/19
 * Time: 2:12 PM
 */

namespace App\General;


use Illuminate\Support\Facades\Storage;

trait Base64Handler {
	protected function SaveBase64FromStr(String $subject, $pattern = '/(data:image\/[^;]+;base64[^"]+)/i')
	{
		$count = preg_match_all($pattern, $subject, $matches);

		if(!$count) return $subject;

		for ($i = 0; $i < $count; $i++){
			$arrPattern[] = env('APP_URL').'/storage/'
			                .$this->UploadBase64($matches[0][$i], 'emailattachmentsImages');
		}
		return preg_replace_array($pattern, $arrPattern, $this->getContent());
	}

	protected function UploadBase64(String $base64,String $folder = '', String $disk = 'public')
	{
		list($type, $data) = explode(';', $base64);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		list(,$ext) = explode('/', $type);

		$uniqueFileName = sha1(time().rand(0,100));
		$storagePath  = Storage::disk($disk)->getDriver()->getAdapter()->getPathPrefix();
		$folder = $folder ? $folder.'/' : '';
		$storageDir = $storagePath.$folder;

		if (!is_dir($storageDir)) {
			mkdir($storageDir);
		}

		file_put_contents($storageDir.$uniqueFileName.'.'.$ext, $data);
		return $folder.$uniqueFileName.'.'.$ext;
	}
}