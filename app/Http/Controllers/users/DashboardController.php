<?php

namespace App\Http\Controllers\users;

use App\General\UserHandler;
use App\General\WelcomeNoteHandler;
use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

	public function index()
    {
	    $userHandler = app()->make('userHandler');

        $commenceDate = Auth::user()->commencedTraining() ? null : $this->NotCommencedUserDate();

	    $currentLessonCourses = $userHandler->getUserCurrentLessonCourses();

	    $currentLesson = $currentLessonCourses ? $currentLessonCourses['currentLesson'] : null;
	    /**
	     * Courses to be started
	     */
	    $dueCourses = $currentLessonCourses ? $currentLessonCourses['dueCourses'] : [];

	    $isLessonCompleted = $currentLesson ? $currentLesson->start &&
	                         $currentLesson->video_progress &&
	                         $currentLesson->assignment_progress
						    : null;
        $nextLessonDate = $isLessonCompleted ? $userHandler->getNextLessonDate() : null;

	    $userCoursesReport = $userHandler->userCoursesReport();

	    $userCourses = $userCoursesReport['courses'];

        $assignmentsSubmittedCount = $userHandler->getUserAssignmentCount();
        $totalPayments = $userHandler->getUserTotalPayment();
        $totalReferrals = $userHandler->getUserTotalRef();

	    /**
	     * Handle Welcome Note view
	     */
	    $welcome_note = (new WelcomeNoteHandler())->getForUser();

        return view('users/dashboard', [
            'lesson' => $currentLesson,
            'dueCourses' => $dueCourses,
            'nextLessonDate' => $nextLessonDate,
            'isLessonCompleted' => $isLessonCompleted,
            'userCourses' => $userCourses,
            'completedCoursesCount' => $userCoursesReport['completed'],
            'progressCoursesCount' => $userCoursesReport['progress'],
            'assignmentsSubmittedCount' => $assignmentsSubmittedCount,
            'totalPayments' => round($totalPayments, 2),
            'totalReferrals' => $totalReferrals,
            'welcome_note' => $welcome_note,
	        'commenceDate' => $commenceDate
            ]);
    }

    private function NotCommencedUserDate()
    {
	    /**
	     * get next batch start date
	     */
	    $batch = Batch::whereRaw('start_date > CURDATE()')
	            ->orderBy('start_date', 'ASC')->take(1)->first();

	    if(!$batch) $date = 'Not Specified';
	    else $date = $batch->start_date->format('jS M, Y');


    	return $date;
    }
}
