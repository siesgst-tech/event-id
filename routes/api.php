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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
    // REFRESH, TOKEN AUTH
	Route::post('/auth', ['uses' => 'ApiController@auth'])->middleware('jwt.refresh');
	// AUTH
	Route::post('/login', ['uses' => 'ApiController@login']);
	// With Middleware for logged in
	Route::group(['middleware' => ['jwt.verify']], function () {
		// SETTINGS
		Route::post('/settings/profile', ['uses' => 'ApiController@update_profile']);
		Route::post('/settings/password', ['uses' => 'ApiController@update_password']);
		// USER EVENTS
        Route::post('/user/entries', ['uses' => 'ApiController@my_entries']);
        Route::post('/user/messages', ['uses' => 'ApiController@my_messages']);
        // EVENT HEADS
        Route::post('/events/entries', ['uses' => 'ApiController@event_entries']);
	});
});
