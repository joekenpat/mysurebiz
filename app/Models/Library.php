<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'library';
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function BusinessCategories()
    {
        return $this->hasMany('App\Models\LibraryBusinessCategory', 'library_id', 'id');
    }
}
