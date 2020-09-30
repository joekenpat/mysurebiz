<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 3/23/19
 * Time: 12:13 PM
 */

namespace App\Http\ViewComposers;


use App\General\Messages;
use App\Models\UsersMessageDelete;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserMessages {

	use Messages;

	public function getQuery($extraSelect = '')
	{
		return $this->getMessagesQuery($extraSelect)->where([
			['mail_audiences.period', Auth::user()->period],
			['mails.schedule', '<=', date('Y-m-d', strtotime('now'))],
			['mails.schedule', '>=', Auth::user()->email_verified_at ??
			                         date('Y-m-d', strtotime('tomorrow'))]
		]);
	}

	public function MessagesView(View $view)
	{
		if ( ! Auth::check() ) {
			return $view;
		}
		$deletedMessages = UsersMessageDelete::where('user_id', Auth::id())->get();
		$deletedMessagesIds = $deletedMessages->pluck('mail_id')->toArray();
		$query = $this->getQuery()->whereNotIn('mails.id', $deletedMessagesIds);
		$messages = $query->paginate(20);

		$unreadCount = $query->whereNull('read_mails.mail_id')->count();

		return $view->with(['messages' => $messages, 'unreadCount' => $unreadCount]);
	}
}