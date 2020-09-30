<?php

namespace App\Http\Controllers;

use App\General\CourseLesson;
use App\Models\BusinessCategory;
use App\Models\CourseBusinessCategory;
use App\Models\CoursePeriod;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\General\General;
use App\Models\Course;
use App\Models\Library;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function AddCourse()
    {
        return view('addcourse');
    }

    public function CreateCourse(Request $request)
    {
        $request->validate(array_merge(
        	['start_date' => 'required|date|date_format:Y-m-d|after:yesterday',
            'cover_image' => 'required | mimes:jpeg,jpg,png,gif',
            'action_step_file' => 'required'], CourseLesson::getCourseValidation())
        );

	    return (new CourseLesson())->CreateCourse($request);
    }

    public function ViewCourseAdmin($id)
    {
        General::ImportFirstOrFail();

        $course = DB::table('courses')
            ->leftJoin('users', 'courses.users_id', '=', 'users.id')
            ->leftJoin('course_business_categories',
                'courses.id', 'course_business_categories.course_id')
            ->leftJoin('business_categories', 'business_categories.id',
                'course_business_categories.business_category_id')
            ->select('courses.*', 'users.first_name',
                'users.last_name', 'business_categories.name as category_name')
            ->where('courses.id', $id)
            ->get();

        if ($course->isEmpty()){
            abort(404);
        }
        $uniqueCourse = $course->unique('id')->first();
        if($uniqueCourse->assignment_doc){
            $exists = Storage::disk('local')->exists($uniqueCourse->assignment_doc);
            if($exists){
                $size = Storage::disk('local')->size($uniqueCourse->assignment_doc);
                $uniqueCourse->assignment_doc_size = General::humanFileSize($size);
            }else{
                $uniqueCourse->assignment_doc_size = null;
            }
        }

        $lessons = Lesson::where('course_id', $uniqueCourse->id)->orderBy('created_at', 'ASC')->get();
        $libraries = Library::where([['course_id', $uniqueCourse->id], ['lesson_id', null]])->get();
        if($libraries){
            foreach ($libraries as $library){
                $size = Storage::disk('local')->size($library->file);
                $library['file_size'] = General::humanFileSize($size);
            }
        }

        return view('single_course_page', [
            'uniqueCourse' => $uniqueCourse,
            'course' => $course,
            'lessons' => $lessons,
            'libraries' => $libraries]);
    }

    public function Edit($id)
    {
        $course = Course::where('id', $id)->first();
        if(!$course){
            abort(404);
        }
        $libraries = Library::where(['course_id' => $id, 'lesson_id' => null])->get();
        $business_categories = CourseBusinessCategory::where('course_id', $id)->get();
	    $coursePeriod = CoursePeriod::where('course_id', $id)->get();

        return view('editcourse', [
            'courses' => $course,
            'libraries' => $libraries,
            'business_categories' => $business_categories,
	        'coursePeriod' => $coursePeriod
        ]);
    }


}
