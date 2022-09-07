<?php

use App\Models\Event;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function (\Illuminate\Http\Request $request) {
    return \App\Models\User::all();
    \Log::channel('costume')->emergency('This is testing for ItSolutionStuff.com!');

    return view('welcome');
});
Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
