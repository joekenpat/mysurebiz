<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 10/2/18
 * Time: 9:41 PM
 */

namespace App\General;

use App\Models\Course;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class General
{
    public static function UrlSlug($title)
    {
        $i = 0;
        do{
            if($i){
                $name = str_slug($title.'-'.$i);
            }else{
                $name = str_slug($title);
            }
            $exists = Course::where('url', $name)->first();
            $i++;

        }while($exists);
        return $name;
    }

    public static function uniqueRefCode($code)
    {
        $i = 0;
        do{
            if($i){
                $name = str_slug($code.'-'.$i);
            }else{
                $name = str_slug($code);
            }
            $exists = User::where('ref_code', $name)->first();
            $i++;

        }while($exists);
        return $name;
    }

    public static function FileName($fileObject, $disk, $path)
    {

        $i = 0;
        do{
            $fileName = explode('.', $fileObject->getClientOriginalName())[0];
            $mime = $fileObject->getClientOriginalExtension();

            if($i){
                $name = str_slug($fileName.'-'.$i).'.'.$mime;
            }else{
                $name = str_slug($fileName).'.'.$mime;
            }
            $exists = Storage::disk($disk)->exists($path.'/'.$name);
            $i++;

        }while($exists);
        return $name;
    }

    public static function getFilePath($audience)
    {
        if($audience == 1){
            return "students";
        }
        if($audience == 2){
            return "artisans";
        }
        if($audience == 3){
            return "employees";
        }
        return response()->json(402, ['error' => 'action denied']);
    }
    public static function getAudienceId($audience)
    {
        $audienceSmallCase = strtolower($audience);
        if($audienceSmallCase == "students"){
            return 1;
        }
        if($audienceSmallCase == "artisans"){
            return 2;
        }
        if($audienceSmallCase == "employees"){
            return 3;
        }
	    if($audienceSmallCase == "admins"){
		    return 4;
	    }
        abort(404);
    }

    public static function humanFileSize($size,$unit="") {
        if( (!$unit && $size >= 1<<30) || $unit == "GB")
            return number_format($size/(1<<30),2)."GB";
        if( (!$unit && $size >= 1<<20) || $unit == "MB")
            return number_format($size/(1<<20),2)."MB";
        if( (!$unit && $size >= 1<<10) || $unit == "KB")
            return number_format($size/(1<<10),2)."KB";
        return number_format($size)." bytes";
    }

    public static function ImportFirstOrFail()
    {
        DB::query()->macro('firstOrFail', function () {
            if ($record = $this->first()) {
                return $record;
            }
            abort(404);
        });
    }


    public static function FactoryUniqueFileName($disk, $path, $mime)
    {

        $i = 0;
        do{
            if($i){
                $name = $path.'-'.$i.'.'.$mime;
            }else{
                $name = $path.'.'.$mime;
            }
            $exists = Storage::disk($disk)->exists($name);
            $i++;

        }while($exists);
        return $name;
    }

    public static function findIndex($arr, $id)
    {
	    $collect = collect($arr);
	    return $collect->search(function($q) use ($id) {
		    return $q->id === $id;
	    });
    }

}