<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonProgress extends Model
{
    protected $table = 'lessons_progress';
    protected $fillable = ['user_id', 'lesson_id', 'start', 'video', 'assignment'];
}
