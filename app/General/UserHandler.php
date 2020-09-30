<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 4/30/19
 * Time: 12:46 PM
 */

namespace App\General;


use App\Models\BusinessCategory;
use App\Models\CourseProgress;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserHandler {
	use PaymentHandler, AssignmentHandler, CourseHandler, LessonHandler, TrainingHandler;

	protected $userId, $user, $subscribedCoursesArr, $userCourses;

	public function __construct($userId = null) {
		$this->userId = $userId ?? Auth::id();
		$this->user = null;
		$this->userCourses = null;
		$this->subscribedCoursesArr = null;
	}

	public function getUserTotalRef()
	{
		return User::where(
			'ref_by', User::where('id', $this->userId
			)->firstOrFail()->ref_code)->count();
	}

	public function getCategoryName()
	{
		$categoryId = $this->getUser()->business_category_id;
		return BusinessCategory::where('id', $categoryId)->first()->name;
	}

	public function getUser()
	{
		if(!$this->user) $this->user = User::where('id', $this->userId)->firstOrFail();
		return $this->user;
	}
	public function isUserTakingCourse($courseId)
	{
		return CourseProgress::where([
			'user_id' => $this->userId, 'course_id' => $courseId
		])->first();
	}

	public function SubscribeUserToCourse($courseId)
	{
		CourseProgress::create([
			'user_id' => Auth::id(),
			'course_id' => $courseId
		]);
	}
}