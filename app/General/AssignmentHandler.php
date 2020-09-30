<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 4/30/19
 * Time: 12:51 PM
 */

namespace App\General;


use App\Models\Assignment;

trait AssignmentHandler {

	public function getUserAssignmentCount()
	{
		return Assignment::where('user_id' , $this->userId)->count();
	}

	public function getLessonAssignments($lessonId)
	{
		return Assignment::where([
			['user_id', $this->userId],
			['lesson_id', $lessonId]
		])->select('score')->first();
	}

}