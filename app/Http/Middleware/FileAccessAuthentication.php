<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\Models\CourseBusinessCategory;
use App\Models\Lesson;
use App\Models\Library;
use App\Models\Mailattachement;
use Closure;
use Auth;

class FileAccessAuthentication
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
        $any = $request->route()->parameter('any');
        $access = explode('/', $any)[0];
        $userCategory = Auth::user()->business_category_id;

        //Access for library files
        if($access == "library"){
            $businessId = Library::where('library.file', $any)
                ->leftJoin('course_business_categories',
                    'course_business_categories.course_id', 'library.course_id')
                ->leftJoin('library_business_categories',
                    'library_business_categories.library_id', 'library.id')
                ->select('course_business_categories.business_category_id as busId_1',
                    'library_business_categories.business_category_id as busId_2')
                ->get();
            $isPermitted = $businessId->filter(function ($value) use ($userCategory){
                return ($value->busId_1 == $userCategory) || ($value->busId_2 == $userCategory);
            })->count();
        }

        if($access == "assignments"){
            $businessId = CourseBusinessCategory::
                leftJoin('courses', 'courses.id', 'course_business_categories.course_id')
                ->where('courses.assignment_doc', $any)
                ->leftJoin('lessons', 'lessons.course_id', 'course_business_categories.course_id')
                ->orWhere('lessons.assignment_doc', $any)
                ->select('course_business_categories.business_category_id')
                ->get();

            $isPermitted = $businessId->where('business_category_id', $userCategory)->count();
        }

        if($access == "emailattachments"){
	        $isPermitted = Mailattachement::join('mail_audiences', 'mail_audiences.mail_id', 'mailattachements.mail_id')
                          ->join('users', 'users.period', 'mail_audiences.period')
                          ->where([['mailattachements.attachment', $any],
                              ['users.period', Auth::user()->period]])
                          ->count();
        }

        if($isPermitted || Auth::user()->isAdmin()){
            return $next($request);
        }
        abort(403, "Access Denied");
    }
}
