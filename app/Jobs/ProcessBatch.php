<?php

namespace App\Jobs;

use App\Models\Batch;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessBatch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $batch, $date;
	public $tries = 3;
	public $timeout = 60;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($date, Batch $batch)
    {
    	$this->date = $date;
        $this->batch = $batch;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
	    /**
	     * Handle updated batch
	     * If updated, exit
	     */
    	if($this->date->ne($this->batch->start_date)) return;
	    /**
	     * Update next batch users
	     */
        User::where('batch_id', null)->update(
        	['batch_id' => $this->batch->id]
        );
    }
}
