<?php

namespace App\Http\Controllers\general;

use App\General\General;
use App\General\Messages;
use App\Http\ViewComposers\UserMessages;
use App\Http\Controllers\Controller;
use App\Models\MailAudience;
use App\Models\ReadMail;
use App\Models\UsersMessageDelete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
	use Messages;
    public function index()
    {
    	return view('users.messages');
    }
    public function ViewMessage($id)
    {
    	$isAdmin = Auth::user()->isAdmin();
    	if($isAdmin){
		    $messageQuery = $this->getMessagesQuery('mailattachements.attachment');
	    }else{
		    $messageQuery = (new UserMessages())->getQuery('mailattachements.attachment');

	    }
	    $messageQuery = $messageQuery->leftJoin('mailattachements', 'mailattachements.mail_id', 'mails.id');

	    $messages = $messageQuery->where('mails.id', $id)->get();

	    foreach ($messages as $message){
	    	if($message->attachment){
			    $size = Storage::disk('local')->size($message->attachment);
			    $message->attachment_size = General::humanFileSize($size);
		    }
	    }

	    if($messages->isEmpty()) abort(404);
	    /**
	     * Get message categories
	     */
	    $audiences = null;
	    if($isAdmin) $audiences = $this->getMessageAudiences($messages->first()->id);

    	return view('general.message',
		    ['messages' => $messages, 'audiences' => $audiences]);
    }
    public function TrackMessage($id)
    {
    	ReadMail::firstOrCreate([
    		'user_id' => Auth::id(),
		    'mail_id' => $id,
	    ]);
    	return response()->json(['message' => 'Successful']);
    }

    public function DeleteUserMessage(Request $request)
    {
    	UsersMessageDelete::firstOrCreate([
		    'user_id' => Auth::id(),
		    'mail_id' => $request->id,
	    ]);
    	return response()->json(['message' => "successful"]);
    }
}
