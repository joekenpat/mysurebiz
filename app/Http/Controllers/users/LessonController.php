<?php

namespace App\Http\Controllers\users;

use App\General\CourseLesson;
use App\General\General;
use App\General\LibraryHandler;
use App\General\UserHandler;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\CourseProgress;
use App\Models\Lesson;
use App\Models\LessonProgress;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LessonController extends Controller
{
    private $id;

    public function __construct()
    {
        $this->id = Route::current()->parameter('id');
    }

    private function updateLessonProgress(Array $values)
    {
        LessonProgress::where([
            ['lesson_id',  $this->id],
            ['user_id', Auth::id()]
        ])->update($values);
    }

    public function ViewLesson(Request $request, $id)
    {
    	$userHandler = app()->make('userHandler');
        if(Session::has('courseTitle')){
            return view('users.lesson');
        }

        $lesson = $userHandler->getLesson($id);

	    /**
	     * Update Lesson progress
	     */
	    $currentLessonProgress = $userHandler->updateLessonProgress($lesson);

	    /**
	     * Assignment
	     */
	    $libHandler = new LibraryHandler();
	    if($lesson->assignment_doc){
		    $lesson->assignment_doc_size = $libHandler->getFileSize($lesson->assignment_doc);
	    }

        $previous = $lesson->prev();

	    $next = $request->isNext ? $lesson->next() : false;

        $course = $userHandler->getCourse($lesson->course_id);

        $assignmentReport = $userHandler->getLessonAssignments($lesson->id);

        $libraries = $libHandler->getLessonLibraries($lesson->id);

        return view('users.lesson', ['course' => $course,
            'lesson' => $lesson,
            'libraries' => $libraries,
            'previous' => $previous,
            'next' => $next,
            'lessonProgress' => $currentLessonProgress,
            'assignmentReport' => $assignmentReport
        ]);

    }

    public function VideoTracker(Request $request, $id)
    {
        //Check if Lesson has Assignment
//        $lesson = Lesson::where('id', $id)
//            ->select('assignment_note', 'assignment_doc')->first();
//        if($lesson->assignment_note || $lesson->assignment_doc){
            $this->updateLessonProgress(['video' => 1]);
//        }else{
//            $this->updateLessonProgress(['video' => 1, 'assignment' => 1]);
//        }
    }


    public function SubmitAssignment(Request $request, $id)
    {
        $request->validate([
            'assignment' => 'required|max:5000'
        ]);

        //Check if Lesson has Assignment
        $lesson = Lesson::where('id', $id)
            ->select('assignment_note', 'assignment_doc')->first();
        if(!$lesson->assignment_note && !$lesson->assignment_doc){
            return response()->json(['message' => 'No assignment Found'], 422);
        }

        //Check if user already submitted assignment
        $isSubmitted = Assignment::where([
            ['user_id', Auth::id()],
            ['lesson_id', $id]
        ])->count();
        if($isSubmitted){
            return response()->json(['message' => 'Already submitted assignment'], 422);
        }

        //Upload assignment
        if ($request->hasFile('assignment')) {
            $uniqueFileName = General::FileName($request->assignment, 'local', 'submitted_assignments');
            $assignment = $request->file('assignment')->storeAs(
                'submitted_assignments', $uniqueFileName, 'local'
            );

            $course_id = Lesson::where('id', $id)->select('course_id')->first()->course_id;

            Assignment::create([
                'user_id' => Auth::id(),
                'course_id' => $course_id,
                'lesson_id' => $id,
                'file' => $assignment
            ]);

            //Update Lesson Progress
            $this->updateLessonProgress(['assignment' => 1]);
        }
        return response()->json(['success' => 'Ok'], 200);
    }

    public function FinalProject($courseId)
    {
        $course = Course::where('id', $courseId)
            ->select('id', 'title', 'assignment_note', 'assignment_doc', 'url')
            ->firstOrFail();

        //Checking if all lessons has been completed

        //get incomplete Lessons
        $result = CourseLesson::getIncompleteLessons($courseId);

        //Update Course if completed
        if($result["incomplete"]){
            return view('users.complete-course', [
                'course' => $course,
                'incomplete' => $result["incomplete"],
                'type' => "final action step"
            ]);
        }
        //End Checking if all lessons has been completed


        General::ImportFirstOrFail();

        //Assignment size
	    if($course->assignment_doc){
		    $size = Storage::disk('local')->size($course->assignment_doc);
		    $course->assignment_doc_size = General::humanFileSize($size);
	    }

        //Fetch lessons

        // get previous user id
        $previous = Lesson::where('course_id', $courseId)->max('id');
        // get next user id
//dd($lesson->id);

        $assignmentReport = Assignment::where([
            ['user_id', Auth::id()],
            ['course_id', $courseId],
            ['lesson_id', null]
        ])->select('score')->first();

        return view('users.finalproject', [
            'course' => $course,
            'previous' => $previous,
            'assignmentReport' => $assignmentReport
        ]);

//        return view('users.finalproject', ['course' => $course]);
    }


    //Submit final project
    public function SubmitFinalAssignment(Request $request, $id)
    {
        $request->validate([
            'project' => 'required|max:5000'
        ]);

        //Check if Course has Assignment
        $course = Course::where('id', $id)
            ->select('assignment_note', 'assignment_doc')->first();
        if(!$course->assignment_note && !$course->assignment_doc){
            return response()->json(['message' => 'No assignment Found'], 422);
        }

        //Check if user already submitted assignment
        $isSubmitted = Assignment::where([
            ['user_id', Auth::id()],
            ['course_id', $id],
            ['lesson_id', null]
        ])->count();

        if($isSubmitted){
            return response()->json(['message' => 'Already submitted assignment'], 422);
        }

        //Upload assignment
        if ($request->hasFile('project')) {
            $uniqueFileName = General::FileName($request->project, 'local', 'submitted_assignments');
            $assignment = $request->file('project')->storeAs(
                'submitted_assignments', $uniqueFileName, 'local'
            );

            Assignment::create([
                'user_id' => Auth::id(),
                'course_id' => $id,
                'lesson_id' => null,
                'file' => $assignment
            ]);

            //Update Course Progress
            CourseProgress::where([
                ['course_id',  $id],
                ['user_id', Auth::id()]
            ])->update(['assignment' => 1]);
        }
        return response()->json(['success' => 'Ok'], 200);
    }
}
