<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseProgress extends Model
{
    protected $table = 'courses_progress';
    protected $fillable = ['course_id', 'user_id', 'completed'];
}
