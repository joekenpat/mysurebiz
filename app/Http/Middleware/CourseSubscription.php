<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\Models\CourseProgress;
use App\Models\Lesson;
use Closure;
use Illuminate\Support\Facades\Auth;

class CourseSubscription
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
        $courseId = $request->route()->parameter('courseid');
	    /**
	     * Check if route from lesson
	     */
	    $userHandler = app()->make('userHandler');

        if($lessonId){
            $isSubscribed = $userHandler->isLessonSubscribed($lessonId);
            if($isSubscribed) return $next($request);
            $courseUrl = $userHandler->getCourseUrlFromLesson($lessonId);
            return redirect()->route('userscourse', ['name' => $courseUrl]);
        }

	    /**
	     * Check if route has CourseId
	     */
        if($courseId){
            $isSubscribed = $userHandler->isCourseSubscribed($courseId);
            if($isSubscribed) return $next($request);
            $courseUrl = $userHandler->getCourseUrl($courseId);
            return redirect()->route('userscourse', ['name' => $courseUrl]);
        }
        return redirect()->route('usersdashboard');
    }
}
