<?php

use App\Http\Controllers\Auth\OauthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use L5Swagger\Http\Controllers\SwaggerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware' => 'web'], function () {
    Route::get('sr/api/docs', [SwaggerController::class,'api']);
});
Route::get('test', [\App\Http\Controllers\TestController::class,'tes





t']);

//Route::get('test', [\App\Http\Controllers\TestController::class,'test']);
Route::get('testcan', [\App\Http\Controllers\TestController::class,'test']);
Route::post('login', [App\Http\Controllers\Auth\OauthController::class,'login']);
//Route::post('register', 'Api\AuthController@register');

Route::middleware('auth:api')->get('/user', [OauthController::class,'user']);
