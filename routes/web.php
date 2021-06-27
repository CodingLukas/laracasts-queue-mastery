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
    foreach (range(1, 100) as $i) {
        \App\Jobs\SendWelcomeEmail::dispatch();
    }

//    \App\Jobs\SendWelcomeEmail::dispatch();

//    \App\Jobs\ProcessPayment::dispatch()->onQueue('payments');

    return view('welcome');
});
