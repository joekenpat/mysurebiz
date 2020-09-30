<?php

namespace App\Http\Controllers;

use App\General\CourseHandler;
use App\General\CourseLesson;
use App\General\FetchModel;
use App\Models\BusinessCategory;
use App\Models\CourseBusinessCategory;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\Course;
use App\General\General;
use App\Models\Library;
use Auth;
use Illuminate\Support\Facades\Storage;

class ManageCoursesController extends Controller
{
	use CourseHandler;
    public function index($business_category_id)
    {
        $allCourses = CourseBusinessCategory::
            where('course_business_categories.business_category_id', $business_category_id)
            ->leftJoin('business_categories',
                'course_business_categories.business_category_id', 'business_categories.id')
            ->join('courses', 'course_business_categories.course_id', 'courses.id')
            ->leftJoin('courses_progress', 'courses_progress.course_id', 'courses.id')
            ->select('courses.title', 'courses.id', 'courses.start_date',
                'courses_progress.completed', 'business_categories.name as category_name')
            ->get();

        $uniqueCourses = $allCourses->unique('id');
        //For Lessons
        $allLessons = Lesson::
            join('courses', 'lessons.course_id', 'courses.id')
            ->leftJoin('course_business_categories', 'courses.id', 'course_business_categories.course_id')
            ->where('course_business_categories.business_category_id', $business_category_id)
            ->leftJoin('lessons_progress', 'lessons.id', 'lessons_progress.lesson_id')
            ->select('lessons.title', 'lessons.id', 'lessons.course_id', 'lessons_progress.start',
                'lessons_progress.video', 'lessons_progress.assignment')
            ->get();

        $uniqueLessons = $allLessons->unique('id');

        //All Categories with course id
        $allCategoriesCourse = FetchModel::GetCourseCategories();

        $type = BusinessCategory::where('id', $business_category_id)
            ->select('name')->first()->name;

        return view('manage_courses', [
            'allCourses' => $allCourses,
            'uniqueCourses' => $uniqueCourses,
            'allLessons' => $allLessons,
            'uniqueLessons' => $uniqueLessons,
            'allCategoriesCourse' => $allCategoriesCourse,
            'type' => ucfirst($type)
        ]);
    }

    public function UsersCompletedProgressCourse($courseCategory, $status, $courseId)
    {
        return view('users_completed_progress_course');
    }

    //Deleting Courses

    public function Delete(Request $request)
    {
        $course = Course::find($request->id);

        if($course->cover_image){
            Storage::disk('public')->delete($course->cover_image);
        }

        if($course->assignment_doc){
            Storage::disk('local')->delete($course->assignment_doc);
        }

        //Delete libraries

        $libraries = $course->libraries;
        foreach ($libraries as $library){
            if($library->file){
                Storage::disk('local')->delete($library->file);
            }
            $library->delete();
        }

        //fetch associated lessons
        $lessons = $course->lessons;
        foreach ($lessons as $lesson){
            if($lesson->assignment_doc){
                Storage::disk('local')->delete($lesson->assignment_doc);
            }
            $lesson->delete();
        }

        //finally delete course
        $course->delete();
        return response()->json(["message" => "successful"]);
    }

    public function DeleteCoverImage(Request $request)
    {
        $course = Course::where('id', $request->id)->first();
        if($course->cover_image != "cover_images/default.jpg"){
            Storage::disk('public')->delete($course->cover_image);
        }
        $course->cover_image = 'cover_images/default.jpg';
        $course->save();
    }

    public function DeleteCourseAssignment(Request $request)
    {
        $course = Course::where('id', $request->id)->first();
        Storage::disk('local')->delete($course->assignment_doc);
        $course->assignment_doc = null;
        $course->save();
    }

    public function Update(Request $request)
    {
        $request->validate(array_merge(
        	['cover_image' => 'mimes:jpeg,jpg,png,gif'],
        	CourseLesson::getCourseValidation())
        );
	    return (new CourseLesson())->EditCourse($request);
    }
}
