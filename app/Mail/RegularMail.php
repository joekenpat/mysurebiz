<?php

namespace App\Mail;

use App\Models\AllMail;
use App\Models\Mailattachement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class RegularMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $mailId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AllMail $mail)
    {
        $this->subject = $mail->subject;
        $this->content = $mail->content;
        $this->mailId = $mail->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    	$attachments = Mailattachement::where('mail_id', $this->mailId)->get();
	    $view = $this->subject($this->subject)->markdown('emails.regularemail');
	    foreach ($attachments as $attachment){
	    	$view->attachFromStorageDisk('local', $attachment->attachment);
	    }
        return $view;
    }
}
