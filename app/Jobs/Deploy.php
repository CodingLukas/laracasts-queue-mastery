<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;

class Deploy implements ShouldQueue
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

        sleep(5);

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

    public function middleware()
    {
        return [
            new WithoutOverlapping('deployments', 10) // it won't block but it will release job back to queue and it won't throw an exception
        ];
    }
}
