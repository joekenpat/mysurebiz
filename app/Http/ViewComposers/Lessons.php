<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 10/31/18
 * Time: 5:26 AM
 */

namespace App\Http\ViewComposers;


use App\General\CourseLesson;
use App\General\General;
use App\Models\Course;
use App\Models\CourseProgress;
use App\Models\Lesson;
use http\Env\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Carbon\Carbon;

class Lessons
{
    protected $lessons;

    public function LessonsWithCourseId($courseId)
    {
    	$userHandler = app()->make('userHandler');
	    /**
	     * Get when course was started
	     */
	    $lessons = $userHandler->getLessonsInCourse($courseId);
	    foreach ($lessons as $lesson){
		    $lesson->eligible = $userHandler->isLessonDueWithId($lesson->id);
	    }
	    /**
	     * Progress report
	     */
        $lessonsProgress = $userHandler->getLessonsProgress($courseId);

        foreach ($lessons as $mylesson){
            foreach ($lessonsProgress as $lessonProgress){
                if($mylesson->id == $lessonProgress->id){
                    $mylesson->start = $lessonProgress->start;
                    $mylesson->video_progress = $lessonProgress->video;
                    $mylesson->assignment_progress = $lessonProgress->assignment;
                    goto a;
                }
            }
            $mylesson->start = null;
            $mylesson->video_progress = null;
            $mylesson->assignment_progress = null;
            a:
        }

        //Check if Final Project is eligible to show
        $courseProjectProgress = null;
	    $isProject = $userHandler->isProjectDue($courseId);

        if($isProject){
            $courseProjectProgress = CourseProgress::where([
                ['user_id', Auth::id()],
                ['course_id', $courseId]
            ])->select('assignment', 'completed')->first();
        }

        //Check if taking course or not logged in
        if(!$courseProjectProgress || !Auth::check()){
            return ['lessons' => $lessons,
                'courseAssignmentProgress' => null,
                'courseCompleteProgress' => null,
                'isProject' => $isProject
            ];
        }

        $courseAssignmentProgress = $courseProjectProgress->assignment;
        $courseCompleteProgress = $courseProjectProgress->completed;
        return [
            'lessons' => $lessons,
            'courseAssignmentProgress' => $courseAssignmentProgress,
            'courseCompleteProgress' => $courseCompleteProgress,
            'isProject' => $isProject
        ];
    }

    public function compose(View $view)
    {
        $currentRoute = Route::current();
        $params = $currentRoute->parameters();

        $isCourseId = array_key_exists('courseid', $params);
        $isLessonId = array_key_exists('id', $params);
        $isUrl = array_key_exists('name', $params);

        if($isCourseId){
            $id = $params["courseid"];
        }
        if($isLessonId){
            $id = Lesson::where('id', $params["id"])
                ->select('course_id')->first()->course_id;
        }
        if($isUrl){
           $id = Course::where('url', $params["name"])
               ->select('id')->first()->id;
        }

        $results = $this->LessonsWithCourseId($id);

        $view->with(['lessons' => $results['lessons'],
            'courseAssignmentProgress' => $results['courseAssignmentProgress'],
            'courseCompleteProgress' => $results['courseCompleteProgress'],
            'isProject' => $results['isProject'],
            'courseid' => $id
            ]);
    }
}