<?php

namespace App\Jobs;

use App\Mail\EmailConfirmation;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProcessEmailConfirmation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    public $tries = 3;

    public $timeout = 60;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info(var_dump($this->user));

        try {
            Mail::to($this->user->email)->send(
                new EmailConfirmation(
                    $this->user->first_name,
                    route(
                        'verify',
                        [
                            'refcode' => $this->user->ref_code,
                            'code' => $this->user->email_verification_code
                        ]
                    )
                )
            );
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
