<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 11/4/18
 * Time: 2:52 PM
 */

namespace App\Http\ViewComposers;

use App\Models\Assignment;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserNotifications extends UserMessages
{
    private $unseenScores;
    private $totalNotifications;

    public function __construct()
    {
	    if ( ! Auth::check() ) {
		    return;
	    }
        $this->unseenScores = Assignment::
        leftJoin('courses', 'courses.id', 'assignments.course_id')
            ->leftJoin('lessons', 'lessons.id', 'assignments.lesson_id')
            ->where('assignments.user_id', Auth::id())
            ->whereNotNull('score')
            ->whereNull('seen')
            ->select('assignments.course_id', 'assignments.lesson_id',
                'lessons.title as lesson_title', 'courses.title as course_title')
            ->paginate(20);
        $this->totalNotifications = $this->unseenScores->count();
	    parent::__construct();
    }

    private function Values($unseenScores)
    {
        $allCourseScores = $unseenScores->where('lesson_id', null);
        $uniqueCourses = $allCourseScores->unique('course_id');

        $allLessonScores = $unseenScores->filter(function($value, $key){
            return $value->lesson_id != null;
        });
        $uniqueLessons = $allLessonScores->unique('lesson_id');

        return [
            'allCourseScores' => $allCourseScores,
            'uniqueCourses' => $uniqueCourses,
            'allLessonScores' => $allLessonScores,
            'uniqueLessons' => $uniqueLessons,
            'unseenScores' => $unseenScores,
            'totalNotifications' => $this->totalNotifications
        ];
    }

    public function NotificationsView(View $view)
    {
        $view->with(array_merge($this->Values($this->unseenScores), [
            'links' => $this->unseenScores->links()
        ]));
    }

    public function compose(View $view)
    {
	    if ( ! Auth::check() ) {
		    return;
	    }
        $unseenScores = $this->unseenScores->take(4);
        $view->with($this->Values($unseenScores));
    }
}