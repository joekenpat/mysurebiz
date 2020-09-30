<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value/100;
    }
}
