<?php

namespace App\Http\Controllers;

use App\General\CourseLesson;
use App\General\General;
use App\Models\Student;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id)
    {
        $userInfo = User::where('users.id', $id)->join(
        	'business_categories', 'business_categories.id', 'users.business_category_id')
	        ->leftJoin('students', 'students.users_id', 'users.id')
	        ->leftJoin('artisans', 'artisans.users_id', 'users.id')
	        ->leftJoin('employees', 'employees.users_id', 'users.id')
	        ->leftJoin('admins', 'admins.users_id', 'users.id')
	        ->leftJoin('batches', 'batches.id', 'users.batch_id')
            ->select('students.*', 'artisans.*', 'employees.*', 'admins.*', 'users.*',
	            'business_categories.name as business_category,', 'batches.name as batch_name')
            ->firstOrFail();

        $userSubscribedCourses = CourseLesson::SubscribedCoursesAndProgress($id);
        return view('user_profile', ['userInfo' => $userInfo,
                                     'userSubscribedCourses' => $userSubscribedCourses]);
    }
}
