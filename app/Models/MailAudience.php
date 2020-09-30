<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailAudience extends Model
{
	protected $guarded = [];

	public function MailId()
	{
		return $this->belongsTo( 'App\Models\AllMail' );
	}
}
