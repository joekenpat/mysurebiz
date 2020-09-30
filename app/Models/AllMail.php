<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllMail extends Model
{
	protected $table = 'mails';
    protected $guarded = ['id'];

	public function Attachments()
	{
		return $this->hasMany('App\Models\Mailattachement','mail_id');
	}
	public function MailAudiences()
	{
		return $this->hasMany('App\Models\MailAudience', 'mail_id');
	}
}
