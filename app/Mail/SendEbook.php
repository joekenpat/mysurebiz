<?php

namespace App\Mail;

use App\Models\Ebook;
use App\Models\EbookSale;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEbook extends Mailable {
	use Queueable, SerializesModels;

	public $ebookSale, $resend;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct( EbookSale $ebookSale, $resend = false ) {
		$this->ebookSale = $ebookSale;
		$this->resend = $resend;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {

		$ebook = Ebook::find($this->ebookSale->ebook_id);

		$data = [
			"title"   => $ebook->title,
		];

		return $this->markdown( 'emails.ebooks.send-ebook' )
		            ->attachFromStorage(
			            $ebook->ebook
		            )->with( $data );
	}
}
