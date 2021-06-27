<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $maxExceptions = 2;
    public $tries = 10;
    /**
     * if $backoff array count is less than $tries then worker will wait 2 secs before trying again, then next time 3 secs, and so on adding +1 everytime
     * if $backoff [2, 5, 10] array count is equals $tries then worker will wait first time 2 secs, second time 5 secs, last time 10 secs
     * if $backoff [2, 5, 10] array count is bigger than $tries then worker will wait 2 secs first time, then next time 5 secs, and then all other times 10 secs
     */
//    public $backoff = [2, 10];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        throw new \Exception();

        return $this->release();
    }

//    public function retryUntil()
//    {
//        return now()->addMinute();
//    }

    public function failed($e)
    {
        info('Failed');
    }
}
