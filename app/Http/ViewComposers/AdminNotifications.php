<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 11/3/18
 * Time: 3:58 PM
 */

namespace App\Http\ViewComposers;


use App\Models\Assignment;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class AdminNotifications
{
    private $unscoredAssignments;
    private $totalNotifications;

    public function __construct()
    {
        $this->unscoredAssignments = Assignment::
        leftJoin('courses', 'courses.id', 'assignments.course_id')
            ->leftJoin('lessons', 'lessons.id', 'assignments.lesson_id')
            ->whereNull('score')
            ->select('assignments.course_id', 'assignments.lesson_id',
                'lessons.title as lesson_title', 'courses.title as course_title')
            ->paginate(20);
        $this->totalNotifications = $this->unscoredAssignments->count();
    }

    private function Values($unscoredAssignments)
    {
        $allCourseProjects = $unscoredAssignments->where('lesson_id', null);
        $uniqueCourses = $allCourseProjects->unique('course_id');

        $allLessonAssignments = $unscoredAssignments->filter(function($value, $key){
            return $value->lesson_id != null;
        });
        $uniqueLessons = $allLessonAssignments->unique('lesson_id');

        return [
                'allCourseProjects' => $allCourseProjects,
                'uniqueCourses' => $uniqueCourses,
                'allLessonAssignments' => $allLessonAssignments,
                'uniqueLessons' => $uniqueLessons,
                'unscoredAssignments' => $unscoredAssignments,
                'totalNotifications' => $this->totalNotifications
                ];
    }

    public function NotificationsView(View $view)
    {
        $view->with(array_merge($this->Values($this->unscoredAssignments), [
            'links' => $this->unscoredAssignments->links()
        ]));
    }

    public function compose(View $view)
    {
        $unscoredAssignments = $this->unscoredAssignments->take(4);
        $view->with($this->Values($unscoredAssignments));
    }

}