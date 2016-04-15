<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\TBot;

/**
 * Class HandleMessage
 *
 * @package App\Jobs
 */
class HandleMessage extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    
    protected $request;


    /**
     * HandleMessage constructor.
     *
     * @param array $request
     */
    public function __construct(TBot $bot, array $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // save data to DB
        
    }
}
