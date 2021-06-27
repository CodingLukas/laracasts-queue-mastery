<?php

use App\Jobs\Deploy;
use App\Jobs\PullRepo;
use App\Jobs\RunTests;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $chain = [
        new PullRepo('laracasts/project1'),
        new PullRepo('laracasts/project2'),
        new PullRepo('laracasts/project3')
    ];

//    \Illuminate\Support\Facades\Bus::chain($chain)->dispatch(); // works like chain of responsibility pattern
    \Illuminate\Support\Facades\Bus::batch($chain)->allowFailures()->dispatch(); // multiple workers will run in parallel

//    \App\Jobs\SendWelcomeEmail::dispatch();

//    \App\Jobs\ProcessPayment::dispatch()->onQueue('payments');

    return view('welcome');
});
