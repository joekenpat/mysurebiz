<?php

namespace App\Http\Controllers;

use App\General\Messages;
use App\Models\AllMail;
use App\Models\MailAudience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
	use Messages;
    public function index()
    {
	    $messages = AllMail::leftJoin('users', 'users.id', 'mails.user_id')
		            ->where('mails.deleted', 0)
				    ->select(DB::raw($this->select))
		            ->orderBy('schedule', 'DESC')
			        ->paginate(10);
	    $messageCount = AllMail::count();
	    /**
	     * Get Message audience
	     */
	    $mailIds = $messages->pluck('id')->toArray();
	    $mailAudiences = MailAudience::whereIn('mail_audiences.mail_id', $mailIds)
	                                    ->select('mail_id', 'period')->get();
	    foreach ($messages as $message){
	    	$message->audiences = $mailAudiences->where('mail_id', $message->id);
	    }
    	return view('messages', ['messages' => $messages, 'messageCount' => $messageCount]);
    }

    public function Delete(Request $request)
    {
    	$mail = AllMail::where('id', $request->id)->first();
    	$mail->deleted = 1;
    	$mail->save();
    	return response()->json(['message' => 'Successful']);
    }
}
