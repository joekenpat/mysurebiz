<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 4/30/19
 * Time: 4:27 PM
 */

namespace App\General;


use App\Models\Lesson;
use App\Models\LessonProgress;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

trait LessonHandler {

	public function allUserLessons($userId = null)
	{
		return $this->allUserLessonQuery($userId)->get();
	}

	public function allUserLessonCount($userId = null)
	{
		return $this->allUserLessonQuery($userId)->count();
	}

	private function allUserLessonQuery($userId = null)
	{
		$courseIds = $this->getUserCourses($userId)->pluck('id');
		return Lesson::whereIn('course_id', $courseIds);
	}

	public function allLessonCourseQuery()
	{
		return $this->userCoursesQuery($this->userId)
		            ->leftJoin('lessons', 'lessons.course_id', 'courses.id')
					->orderBy('lessons.id', 'ASC')
		            ->leftJoin('courses_progress', function ($join){
			            $join->on('courses_progress.course_id', '=', 'courses.id')
			                 ->where('courses_progress.user_id', $this->userId);
		            });
		//					->whereNotNull('lessons.id')
	}

	/**
	 * get all lesson and course combined with course progress id
	 * @return mixed
	 */
	public function allLessonCourse()
	{
		$allLessonsCourses = $this->allLessonCourseQuery()
                  ->select('courses.url as course_url', 'courses.title as course_title',
				'courses.id as course_id', 'courses.video as course_video',
				'courses.cover_image as course_image', 'lessons.id', 'lessons.title',
				'lessons.video', 'courses_progress.id as progress_id')->get();
		return $allLessonsCourses;
	}
	public function allLessons()
	{
		return $this->allLessonCourse()->where('id', '!=', null);
	}
	/**
	 * Get all lessons in a course
	 */

	public function getLessonsInCourse($courseId)
	{
		return Lesson::where('course_id', $courseId)->orderBy('created_at', 'ASC')->get();
	}

	/**
	 * retrieves users current lesson and courses not yet commenced
	 * @return array
	 */

	public function getUserCurrentLessonCourses()
	{
		$noOfEligibleLessons = CourseLesson::getNoOfEligibleLessons();
		$totalLessonCount = $this->allUserLessonCount(Auth::id());

		if($noOfEligibleLessons > $totalLessonCount) return null;

		/**
		 * Get all User lessons and courses
		 */

		$allLessonsCourses = $this->allLessonCourse();
		/**
		 * Get user Current Lesson
		 */
		$currentLesson = $allLessonsCourses->where('id', '!=', null)
		                                     ->slice($noOfEligibleLessons - 1)
		                                     ->first();
		/**
		 * Courses that are due but not yet started
		 */
		$lessonIndex = $allLessonsCourses->search(function($q) use ($currentLesson) {
			return $q->id === $currentLesson->id;
		});

		$allLessonsCourses->splice($lessonIndex + 1);

		$dueCourses = $allLessonsCourses->where('progress_id', '=', null)->unique('course_id');
		$lessonProgress = LessonProgress::where([
							'lesson_id' => $currentLesson->id,
							'user_id' => Auth::id()])->first();
		$currentLesson->start = $lessonProgress ? $lessonProgress->start : null;
		$currentLesson->video_progress = $lessonProgress ? $lessonProgress->video : null;
		$currentLesson->assignment_progress = $lessonProgress ? $lessonProgress->assignment : null;

		return ['currentLesson' => $currentLesson, 'dueCourses' => $dueCourses];
	}

	public function getNextLessonDate()
	{
		$noOfEligibleLessons = CourseLesson::getNoOfEligibleLessons();
		$lessonDurationDays = $this->getUser()->LessonDuration('days');
		$daysOffset = $lessonDurationDays * $noOfEligibleLessons;
		$today = strtotime($this->getTrainingStartedAt().' + '.$daysOffset.' days');
		return date('l d M, Y', $today);
	}

	public function isLessonSubscribed($lessonId)
	{
		return Lesson::where('lessons.id', $lessonId)
		             ->join('courses_progress', 'lessons.course_id', '=', 'courses_progress.course_id')
		             ->where('courses_progress.user_id', $this->userId)
		             ->exists();
	}

	/**
	 * @param UserHandler $userHandler
	 * @param $lessonPosition
	 * $lessonPosition is the position of lesson less by 1
	 *
	 * @return array
	 */
	public function isLessonDue($lessonPosition = null, $subscribedCoursesArr = null,
		$id = null, $isProject = false)
	{
		if(!$lessonPosition){
			$collect = collect($subscribedCoursesArr);
			$index = General::findIndex($subscribedCoursesArr, (int) $id);
			$index = $isProject ? ($index + 1) : $index;
			$collect->splice($index);
			/**
			 * Sum lessons
			 */
			$isIntroduction = $collect->where('no_lessons', '!=', null)->isEmpty();

			$lessonPosition = $isProject && !$isIntroduction ? $collect->sum('no_lessons') + 1
										: $collect->sum('no_lessons');
		}
		$trainingStart = $this->getTrainingStartedAt();
		$AllLessonDuration = $this->getUser()->LessonDuration('days') * $lessonPosition;
		$today = Carbon::now();
		$dueDate = $trainingStart->addDays($AllLessonDuration);
		return ['check' => $today >= $dueDate, 'lesson_position' => $lessonPosition];
	}

	public function isNextLessonDue($position)
	{
		return $this->isLessonDue($position)['check'];
	}

	public function getIncompletePrevLessons($lessonId)
	{
		$courseIdLessonTitle = Lesson::where('lessons.id', $lessonId)
		                             ->join('courses', 'courses.id', 'lessons.course_id')
		                             ->select('courses.id', 'lessons.title')->first();

		$previousLessons = Lesson::where([['lessons.course_id', $courseIdLessonTitle->id],
			['lessons.id', '<', $lessonId]])
             ->join('lessons_progress', 'lessons_progress.lesson_id', 'lessons.id')
             ->where('user_id', Auth::id())
             ->where(function ($query) {
                 $query->whereNull('lessons_progress.start')
                       ->orWhereNull('lessons_progress.video')
                       ->orWhereNull('lessons_progress.assignment');
             })
             ->select('lessons.id', 'lessons.title')
             ->get();
		return ['data' => $previousLessons, 'lesson_title' => $courseIdLessonTitle->title];
	}

	public function getLesson($lessonId)
	{
		return Lesson::leftJoin('users', 'lessons.users_id', '=', 'users.id')
		             ->where('lessons.id', $lessonId)
		             ->select('lessons.*', 'users.first_name', 'users.last_name', 'users.id as users_id')
		             ->firstOrFail();
	}

	public function updateLessonProgress(Lesson $lesson)
	{
		$video = $lesson->video ? null : 1;
		$assignment = ($lesson->assignment_note || $lesson->assignment_doc) ? null : 1;

		return LessonProgress::firstOrCreate(
					['lesson_id'=> $lesson->id, 'user_id'=> $this->userId],
					['start' => 1, 'video' => $video, 'assignment' => $assignment]
				);
	}
	public function getLessonsProgress($courseId)
	{
		return Lesson::where('lessons.course_id', $courseId)
		             ->leftJoin('lessons_progress', 'lessons.id', '=', 'lessons_progress.lesson_id')
		             ->select('lessons.id', 'lessons_progress.start',
			             'lessons_progress.video',
			             'lessons_progress.assignment')
		             ->where('lessons_progress.user_id', $this->userId)
		             ->get();
	}

	public function getLessonPosition(Collection $allLessons, $id)
	{
		$index = General::findIndex($allLessons, $id);
		$position = 0;
		for($i = 0; $i <= $index; $i++){
			if(isset($allLessons[$i])) $position++;
		}
		//minus 1 because index starts from zero
		return $position - 1;
	}

	public function isLessonDueWithId($lessonId){
		$lessonPosition = $this->getLessonPosition($this->allLessons(), $lessonId);
		return $this->isLessonDue($lessonPosition)['check'];
	}
}