<?php

namespace App\Http\Controllers;

use App\General\Base64Handler;
use App\General\CourseLesson;
use App\General\WelcomeNoteHandler;
use App\Interphace\Base64Interphase;
use App\Models\WelcomeNote;
use Illuminate\Http\Request;

class WelcomeNoteController extends Controller implements Base64Interphase
{
	use Base64Handler;
	private $request;

	public function __construct(Request $request) {
		$this->request = $request;
	}

	public function getContent() {
		return $this->request->welcome_note;
	}

	public function Edit(Request $request)
    {
    	if($request->isMethod('post')){
    		$request->validate([
    			'welcome_note' => 'required',
			    'video' => 'sometimes'
		    ]);

		    if($request->video){
			    $request->video = CourseLesson::getVideoEmbedUrl($request->video_id);
		    }
		    $content = $this->SaveBase64FromStr($request->welcome_note);

    		WelcomeNote::updateOrCreate(
    			['id' => 1],
			    ['content' => $content, 'video' => $request->video]
		    );
    		return response()->json(['message' => 'Successful']);
	    }
    	return view('edit_welcome_note', ['welcome_note' => $this->getWelcomeNote()]);
    }
    private function getWelcomeNote()
    {
    	return (new WelcomeNoteHandler())->get();
    }

    public function View()
    {
    	return view('general.welcome_note', ['welcome_note' => $this->getWelcomeNote()]);
    }
}
