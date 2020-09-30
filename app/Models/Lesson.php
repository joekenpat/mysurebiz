<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function libraries()
    {
        return $this->hasMany('App\Models\Library');
    }
    public function next()
    {
    	return Lesson::where([['id', '>', $this->id], ['course_id', $this->course_id]])->min('id');
    }

    public function prev()
    {
    	return Lesson::where([['id', '<', $this->id], ['course_id', $this->course_id]])->max('id');
    }
}
