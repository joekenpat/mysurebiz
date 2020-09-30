<?php

namespace App\Http\Middleware;

use App\Models\Lesson;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PreviousLessonCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	$userHandler = app()->make('userHandler');

        $lessonId = $request->route()->parameter('id');

        $previousLessons = $userHandler->getIncompletePrevLessons($lessonId);
	    $prevLessons = $previousLessons['data'];

        if(!$prevLessons->isEmpty()){
            Session::flash('previousLessons', $prevLessons);
            Session::flash('courseTitle', $previousLessons['lesson_title']);
        }
        return $next($request);
    }
}
