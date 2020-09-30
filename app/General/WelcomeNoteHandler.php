<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 5/17/19
 * Time: 12:29 PM
 */

namespace App\General;


use App\Models\UsersWelcomeNote;
use App\Models\WelcomeNote;
use Illuminate\Support\Facades\Auth;

class WelcomeNoteHandler {
	public function getQuery()
	{
		return WelcomeNote::where('id', 1)->select('id', 'content', 'video');
	}
	public function get()
	{
		return $this->getQuery()->first();
	}

	public function isSeen()
	{
		return UsersWelcomeNote::where('user_id', Auth::id())->exists();
	}
	public function getForUser()
	{
		if($this->isSeen()) return null;
		$welcome_note = $this->get();
		UsersWelcomeNote::insert([
			'user_id' => Auth::id(),
			'welcome_note_id' => $welcome_note->id
		]);
		return $welcome_note;
	}
}