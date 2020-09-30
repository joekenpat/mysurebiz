<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserCourseCategory
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
//        $name = $request->route()->parameter('name');
//        if($request->start == 1){
//            $eligible = Course::where('courses.url', $name)
//                ->join('course_business_categories',
//                'course_business_categories.course_id', 'courses.id')
//                ->where('course_business_categories.business_category_id', Auth::user()->business_category_id)
//                ->count();
//            if(!$eligible){
//                $category = User::join('business_categories',
//                    'business_categories.id', 'users.business_category_id')
//                    ->select('business_categories.name')->first()->name;
//
//                Session::flash('message', "Sorry, {$category} members do not have access to this course.");
//                Session::flash('alert-class', 'alert-danger');
//                return redirect()->route('userscourse', ['name' => $name]);
//            }
//        }
        return $next($request);
    }
}
