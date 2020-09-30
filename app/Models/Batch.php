<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = ['name', 'start_date'];
    protected $dates = ['start_date'];
}
