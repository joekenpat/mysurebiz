<?php

namespace App\Http\Controllers\users;

use App\General\CourseLesson;
use App\General\General;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $courseLibrary = Course::join('courses_progress', 'courses_progress.course_id', 'courses.id')
                        ->where('courses_progress.user_id', Auth::id())
                        ->join('library', 'library.course_id', 'courses.id')
                        ->whereNull('library.lesson_id')
                        ->select('courses.url', 'courses.title', 'library.file', 'courses.id')
                        ->get();
        $uniqueCourseLibrary = $courseLibrary->unique('url');

        //General Library
        $generalLibrary = Library::join('library_business_categories',
            'library_business_categories.library_id', 'library.id')
            ->where('library_business_categories.business_category_id', Auth::user()->business_category_id)
            ->select('library.file', 'course_id')
            ->get();
        $uniqueGeneralLibrary = $generalLibrary->unique('course_id');

        $uniqueCourseGeneralLibrary = $uniqueCourseLibrary->concat($uniqueGeneralLibrary);

        $lessonLibrary = Lesson::
            join('courses_progress', 'courses_progress.course_id', 'lessons.course_id')
            ->where('courses_progress.user_id', Auth::id())
            ->join('library', 'library.lesson_id', 'lessons.id')
            ->select('lessons.id', 'lessons.title', 'library.file', 'courses_progress.course_id')
            ->get();
        $uniqueLessonLibrary = $lessonLibrary->unique('id');

        //take care of viewing lessons befor their period
        foreach ($uniqueCourseLibrary as $course){
            $noOfEligibleLessons = CourseLesson::getNoOfEligibleLessons($course->id);
            $noLessons = $uniqueLessonLibrary->count();
            $course->showCourseLibrary = ($noOfEligibleLessons >= $noLessons)?true:false;
            $course->noEligibleLessons = $noOfEligibleLessons;
        }

        return view('users.library', [
            'courseLibrary' => $courseLibrary,
            'uniqueCourseGeneralLibrary' => $uniqueCourseGeneralLibrary,
            'lessonLibrary' => $lessonLibrary,
            'uniqueLessonLibrary' => $uniqueLessonLibrary,
            'generalLibrary' => $generalLibrary
        ]);
    }
}
