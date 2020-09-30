<?php

namespace App\Jobs;

use App\Mail\RegularMail;
use App\Models\AllMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mail;
    protected $period;
	public $tries = 3;
	public $timeout = 60;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Allmail $mail)
    {
        $this->mail = $mail;
        $this->period = now();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    	if($this->mail->deleted === 1){
    		$this->mail->delete();
    		return;
	    }
        // $users = User::whereIn('period', $this->period)->get();
        $users = User::where('role', 4)->get();
//	                 ->whereRaw('batch_id IS NOT NULL')->get();

	    // foreach ($users as $user){
		//     Mail::to($user->email)->later(
		// 	    new Carbon($this->mail->schedule),
		//     	new RegularMail($this->mail));
        // }

        try{
            foreach ($users as $user){
                Mail::to($user->email)->send(
                    new RegularMail($this->mail));
                    Log::error("mail to ".$user->email);
            }
        }catch(\Exception $e){
            Log::error($e);
        }
    }
}
