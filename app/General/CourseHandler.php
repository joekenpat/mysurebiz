<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 4/29/19
 * Time: 1:45 PM
 */

namespace App\General;


use App\Models\Course;
use App\Models\CoursePeriod;
use App\Models\CourseProgress;
use App\Models\Lesson;
use App\User;
use Illuminate\Support\Facades\Auth;

trait CourseHandler {

	protected $period = [6,12,18,24,30,36,48,60];

	public function getCoursePeriods($id)
	{
		return CoursePeriod::where('course_id', $id)->get();
	}

	public function userCoursesQuery($userId = null)
	{
		$userId = $userId ?? $this->userId;
		$userCatId = User::where('id', $userId)->firstOrFail()->business_category_id;

		return Course::join('course_periods', 'course_periods.course_id', 'courses.id')
		             ->join('users', 'users.period', 'course_periods.period')
		             ->join('course_business_categories',
			             'course_business_categories.course_id', 'courses.id')
		             ->where(['users.id' => $userId,
		                      'course_business_categories.business_category_id' => $userCatId])
					->orderBy('courses.start_date', 'ASC');
//		->whereRaw('courses.start_date <= CURDATE()')
	}

	public function getUserCourses($userId = null)
	{
		return $this->userCourses ?? $this->userCoursesQuery($userId)
						                    ->select('courses.id', 'courses.title',
							                     'courses.cover_image', 'courses.url',
							                     'course_periods.period')->get();
//							->orderBy('courses.created_at', 'ASC')->get()
	}
	public function getUserCourse($url)
	{
		return $this->userCoursesQuery($this->userId)->where('courses.url', $url)
					->join('business_categories', 'business_categories.id',
						'course_business_categories.business_category_id')
                     ->whereRaw('courses.start_date <= CURDATE()')
                     ->select('courses.*', 'course_business_categories.business_category_id',
	                     'business_categories.name as category')
                     ->firstOrFail();
	}

	public function userCoursesReport($userId = null)
	{
		$userCourses = $this->getUserCourses($userId);
		$completedCoursesCount = 0;
		$progressCoursesCount = 0;

		foreach ($userCourses as $course){
			$course->lessonCount = $this->allUserLessons($userId)
			                            ->where('course_id', $course->id)->count();
			$course->duration = CourseLessonOperator::CourseDuration($course->lessonCount);
			$course->eligible = $this->isCourseDue($course->id)['check'];

			if($course->completed){
				$completedCoursesCount++;
			}else{
				$progressCoursesCount++;
			}
		}
		return ['courses' => $userCourses,
				'completed' => $completedCoursesCount,
				'progress' => $progressCoursesCount];
	}

	public function isCourseDue($courseId)
	{
		/**
		 * Get user courses and progress
		 */
		$subscribedCoursesArr = $this->subscribedCoursesArr ??
		                        CourseLesson::SubscribedCoursesAndProgress($this->userId);
		/**
		 * Get total number of lessons before current course
		 */
		$check = $this->isLessonDue(null, $subscribedCoursesArr, $courseId)['check'];

		return ['check' => $check, 'subscribedCoursesArr' => $subscribedCoursesArr];
	}

	public function isProjectDue($courseId)
	{
		$subscribedCoursesArr = collect(CourseLesson::SubscribedCoursesAndProgress($this->userId));
		$isDue = $this->isLessonDue(null, $subscribedCoursesArr, $courseId, true);
		return $isDue['check'];
	}

	public function isCourseSubscribed($courseId)
	{
		return CourseProgress::where([
					['course_id', $courseId],
					['user_id', Auth::id()]
				])->exists();
	}
	public function getCourseUrl($courseId)
	{
		return Course::where('id', $courseId)
		             ->select('courses.url')
		             ->firstOrFail()->url;
	}

	public function getCourseUrlFromLesson($lessonId)
	{
		return Lesson::where('lessons.id', $lessonId)
		             ->join('courses', 'lessons.course_id', '=', 'courses.id')
		             ->select('courses.url')
		             ->firstOrFail()->url;
	}
	public function getCourse($courseId)
	{
		return Course::where('id', $courseId)->first();
	}
}