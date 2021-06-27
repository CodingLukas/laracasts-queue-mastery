<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\ThrottlesExceptions;
use Illuminate\Queue\SerializesModels;

class Deploy implements ShouldQueue//, ShouldBeUniqueUntilProcessing // ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        info('Started Deploying...');

        sleep(500);

        info('Finished Deploying...');

//        Redis::throttle('deployments') // funnel
//            ->allow(10)
//            ->every(60)
//            ->block(10)
//            ->then(function () {
//                info('Started Deploying...');
//
//                sleep(5);
//
//                info('Finished Deploying...');
//            });

//        Cache::lock('deployments')->block(10, function () {
//            info('Started Deploying...');
//
//            sleep(5);
//
//            info('Finished Deploying...');
//
//        });
    }

//    public function uniqueId()
//    {
//        /**
//         * lock will be released when job in the queue will be processed if anything went wrong and wasn't released it will be locked forever
//         * it can be solved with uniqueFor method
//         */
//        return 'deployments';
//    }
//
//    public function uniqueFor()
//    {
//        return 60;
//    }

    public function middleware()
    {
        return [
            new ThrottlesExceptions(10) // handy way to prevent overwhelming our system while a 3rd-party service it relies on experiences an outage
            //new WithoutOverlapping('deployments', 10) // it won't block if job is running but it will release job back to queue and it won't throw an exception
        ];
    }
}
