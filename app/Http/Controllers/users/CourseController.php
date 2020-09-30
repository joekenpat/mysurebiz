<?php

namespace App\Http\Controllers\users;

use App\General\CourseLesson;
use App\General\CourseLessonOperator;
use App\General\LibraryHandler;
use App\General\UserHandler;
use App\Models\CourseProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\General\General;
use App\Models\Course;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function ViewCourse(Request $request, $name)
    {
    	$userHandler = app()->make('userHandler');

    	$course = $userHandler->getUserCourse($name);

	    /**
	     * Check if course is eligible to be viewed
	     */
	    $isCourseDue = $userHandler->isCourseDue($course->id);

	    if(!$isCourseDue['check']) abort(403);

        General::ImportFirstOrFail();

        $isAssignment = Storage::disk('local')->exists($course->assignment_doc);

	    $libHandler = new LibraryHandler();

        if($isAssignment){
	        $course->assignment_doc_size = $libHandler->getFileSize($course->assignment_doc);
        }
	    $lessonsCount = collect($isCourseDue['subscribedCoursesArr'])
		                ->where('id', $course->id)->first()->no_lessons;

        $course->duration = CourseLessonOperator::CourseDuration($lessonsCount);

	    /**
	     * Handle Course Libraries
	     */
        $libraries = $libHandler->getCourseLibraries($course->id);

        foreach ($libraries as $library){
            $library->file_size = $libHandler->getFileSize($library->file);
        }

	    /**
	     * User wants to start training
	     */
	    $userAlreadyTakingCourse = $userHandler->isUserTakingCourse($course->id);
	    $start = false;
        if($request->start == 1){
        	$start = true;
	        /**
	         * If not taking course, subscribe to course
	         */
            if(!$userAlreadyTakingCourse){
                $userAlreadyTakingCourse = $userHandler->SubscribeUserToCourse($course->id);

                $period = CourseLessonOperator::CourseDuration($lessonsCount);
                $note = $period ? "Note that the period for this training is {$period}. 
                            ".PHP_EOL."You are expected to completed all action steps and test within this period."
	                : "Note that you are expected to completed all action steps contained in the training.";

                Session::flash('message', "Congratulations! You successfully commenced this training. You now have full access to the training resources.
                            ".PHP_EOL.$note);
                Session::flash('alert-class', 'alert-success');
            }
        }
        return view('users.course', [
            'course' => $course,
            'libraries' => $libraries,
            'start' => $start,
            'userAlreadyTakingCourse' => $userAlreadyTakingCourse,
	        'subscribedCoursesArr' => $isCourseDue['subscribedCoursesArr']]);
    }

    public function ViewCourses(Request $request)
    {
            $userHandler = new UserHandler();
            $courses = $userHandler->userCoursesReport()['courses'];
            $title = $userHandler->getCategoryName()." Trainings";

        return view('users.courses', [
            'courses' => $courses,
            'title' => $title,
            'request' => $request->allcourses,
            ]);
    }

    public function CompleteCourse($courseid)
    {
        $course = Course::where('id', $courseid)
            ->select('id', 'title')
            ->firstOrFail();

        //get incomplete Lessons
        $result = CourseLesson::getIncompleteLessons($courseid);

        //Update Course if completed
        if(!$result["incomplete"] && $result['courseAssignmentProgress']){
            CourseProgress::where([
                ['user_id', Auth::id()],
                ['course_id', $courseid]
            ])->update(['completed' => 1]);
        }

            return view('users.complete-course', [
                'course' => $course,
                'incomplete' => $result["incomplete"],
                'type' => "training"
            ]);
    }
}
