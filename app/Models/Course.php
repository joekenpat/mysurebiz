<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function getAudienceAttribute($value)
    {
        If($value == 1){
            return "Students";
        }
        If($value == 2){
            return "Artisans";
        }
        If($value == 3){
            return "Employees";
        }

    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    public function libraries()
    {
        return $this->hasMany('App\Models\Library');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'users_id');
    }

    public function BusinessCategories()
    {
        return $this->hasMany('App\Models\CourseBusinessCategory');
    }
	public function Period()
	{
		return $this->hasMany('App\Models\CoursePeriod');
	}
}
