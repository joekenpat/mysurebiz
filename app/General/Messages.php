<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 4/5/19
 * Time: 8:20 AM
 */

namespace App\General;


use App\Models\AllMail;
use App\Models\MailAudience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait Messages {
	protected $select;

	public function __construct() {
		$this->select = 'users.first_name, users.last_name, users.image, mails.id, mails.subject, mails.schedule';
	}

	protected function BuildMessagesQuery()
	{
		return $this->Query();
	}
	protected function BuildMessageQuery()
	{
		return $this->Query()->where('mail_audiences.period', Auth::user()->period);
	}
	protected function Query()
	{
		return AllMail::join('mail_audiences', 'mails.id', 'mail_audiences.mail_id')
		              ->leftJoin('users', 'users.id', 'mails.user_id')
		              ->orderBy('schedule', 'DESC');
	}
	public function getMessagesQuery($extraSelect = '')
	{
		$extraSelectTxt = $extraSelect ? ', '.$extraSelect : $extraSelect;
		return $this->BuildMessagesQuery()
		            ->leftJoin('read_mails', 'read_mails.mail_id', 'mail_audiences.mail_id')
		            ->select(DB::raw('read_mails.mail_id as readmails, mails.schedule, 
									       mails.content,'.$this->select.$extraSelectTxt));
	}
	public function getMessageAudiences($mailId)
	{
		return MailAudience::where('mail_id', $mailId)
		    ->select('period')->get();
	}

}