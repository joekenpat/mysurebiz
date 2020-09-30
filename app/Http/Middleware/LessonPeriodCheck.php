<?php

namespace App\Http\Middleware;

use App\General\CourseLesson;
use App\Models\Lesson;
use Closure;
use Illuminate\Support\Facades\Auth;

class LessonPeriodCheck
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
        $lessonId = $request->route()->parameter('id');

	    /**
	     * If lesson is not qualified to be viewed with time, abort
	     */

        if($lessonId){
	        /**
	         * Creating lesson Service container
	         */
	        app()->singleton(Lesson::class, function () use ($lessonId){
		        return Lesson::where('id', $lessonId)->firstOrFail();
	        });
	        $lesson = app()->make(Lesson::class);

	        $userHandler = app()->make('userHandler');
	        $isLessonDue = $userHandler->isLessonDueWithId((int) $lessonId);

	        if(!$isLessonDue) abort(403);
	        $isNextLessonDue = $userHandler->isLessonDueWithId($lesson->next());
	        $request->isNext = $isNextLessonDue;
        }
        return $next($request);
    }
}
