<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use Spatie\GoogleCalendar\Event;

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
//    return view('welcome');
//    $event = new Event;
//
//    $event->name = 'A new event';
//    $event->startDateTime = Carbon\Carbon::now();
//    $event->endDateTime = Carbon\Carbon::now()->addHour();
//
//    $event->save();
//    $e = Event::get();
//    dd($e);
});

Route::resource('todo', TodoController::class);
