<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 5/2/19
 * Time: 3:17 PM
 */

namespace App\General;


use App\Models\Batch;
use Carbon\Carbon;

trait TrainingHandler {
	public function getTrainingStartedAt($userId = null)
	{
		$user = $userId ? (new UserHandler($userId))->getUser() : $this->getUser();
		$batch = Batch::find($user->batch_id);
		/**
		 * If batch exists, get date. Else, training has not started.
		 * Hence fake a future date
		 */
		return $batch ? $batch->start_date : Carbon::now()->addDays(1);
	}
}