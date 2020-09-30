<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 4/30/19
 * Time: 12:40 PM
 */

namespace App\General;

use App\Models\Payment;


trait PaymentHandler {

	public function getUserTotalPayment()
	{
		return Payment::where('user_id', $this->userId)->sum('amount');
	}

}