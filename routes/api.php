<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1', 'namespace' => 'webServer'], function () {
    Route::group(['middleware' => []], function () {
        Route::post('/authentication', 'AuthController@postAuthentication');
    });
    // Co header la "Beto + token" thi duoc vao
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/authorization', 'AuthController@getAuthorization');
    });
});



