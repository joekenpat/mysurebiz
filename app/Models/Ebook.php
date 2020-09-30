<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $guarded = ["id"];
//    protected $hidden = ["ebook"];

    public function getCoverImageAttribute($value)
    {
	    return $value ? ImageHelper::FormatImageUrl($value) : "/images/pdf.png";
    }
}
