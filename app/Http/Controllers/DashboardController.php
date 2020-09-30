<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Library;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
//Library
        $allLibraries = Library::leftJoin('course_business_categories',
                            'course_business_categories.course_id', 'library.course_id')
                        ->leftJoin('library_business_categories',
                            'library_business_categories.library_id', 'library.id')
                        ->select('course_business_categories.business_category_id', 'library.id',
                            'library_business_categories.business_category_id as library_business_category_id')
                        ->get();
//Course
        $allCourses = Course::leftJoin('course_business_categories',
                    'course_business_categories.course_id', 'courses.id')
                    ->select('course_business_categories.business_category_id',
	                    'course_business_categories.course_id')->get();
//Status
        $status = User::select('status', 'role')->get();
//Payments
        $payments = Payment::leftJoin('users', 'users.id', 'payments.user_id')
                    ->select('payments.amount', 'users.role')->get();

        return view('dashboard', [
            'allLibraries' => $allLibraries,
            'allCourses' => $allCourses,
            'status' => $status,
            'payments' => $payments
        ]);
    }
}
