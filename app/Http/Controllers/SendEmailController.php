<?php

namespace App\Http\Controllers;

use App\General\Base64Handler;
use App\General\CourseHandler;
use App\General\General;
use App\Interphace\Base64Interphase;
use App\Jobs\SendMessage;
use App\Models\AllMail;
use App\Models\Mailattachement;
use App\Models\MailAudience;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;

class SendEmailController extends Controller implements Base64Interphase
{
	use Base64Handler, CourseHandler;

	private $request;

	public function __construct(Request $request) {
		$this->request = $request;
	}
	public function getContent()
	{
		return $this->request->mailcontent;
	}

    public function index()
    {
    	if($this->request->isMethod('post')){
		    return $this->SaveMail();
	    }
    	return view('sendemail');
    }

	private function SaveMail()
    {
	    $this->request->validate([
		    'subject' => 'required|max:255',
		    'period' => 'required|array',
		    'period.*' => Rule::in($this->period),
		    'start_date' => 'required|date|date_format:Y-m-d|after:yesterday',
		    'materials'=> 'sometimes'
	    ]);

	    if ($this->request->hasFile('materials')) {
		    foreach($this->request->materials as $material){
			    $uniqueFileName = General::FileName($material, 'local', 'emailattachments');
			    $materialName = $material->storeAs(
				    'emailattachments', $uniqueFileName, 'local'
			    );
			    $materialNames[] = $materialName;
		    }
	    }

		$content = $this->SaveBase64FromStr($this->getContent());

	    $mail = AllMail::create([
		    'user_id' => Auth::id(),
		    'subject' => $this->request->subject,
		    'schedule' => $this->request->start_date,
		    'content' => $content
	    ]);

	    /*
		 * Save in Mailattachments table
		 */

	    $attachments = [];
	    if($this->request->hasFile('materials')){
		    foreach ($materialNames as $singleMaterial){
			    $attachments[] = new Mailattachement([
				    'attachment' => $singleMaterial
			    ]);
		    }
		    $mail->Attachments()->saveMany($attachments);
	    }
	    //Save in mail_audiences table

	    foreach ($this->request->period as $value){
		    $period[] = new MailAudience([
			    'period' => $value
		    ]);
	    }

	    $mail->MailAudiences()->saveMany($period);

	    /**
	     * Dispatch emails
	     */
	    SendMessage::dispatch($mail, $this->request->period)
	               ->delay(new Carbon($mail->schedule));

	    return response()->json(["message" => "Successful"], 201);
    }
}
