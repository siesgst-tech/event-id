<?php

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
    return view('welcome');
});
// Auth
Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    // Controllers Within The "App\Http\Controllers\Auth" Namespace
    // GET
    Route::get('/register', 'AuthController@show_register');
    Route::get('/login', 'AuthController@show_login');
    Route::get('/forgot', 'AuthController@show_forgot');
    Route::get('/reset/{key}', 'AuthController@show_reset');
    Route::get('/logout', 'AuthController@do_logout');
    // POST
    Route::post('/register', 'AuthController@do_register');
    Route::post('/login', 'AuthController@do_login');
    Route::post('/forgot', 'AuthController@do_forgot');
    Route::post('/reset/{key}', 'AuthController@do_reset');
});
// Admins
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['session.auth']], function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    // GET
    Route::get('/event/add', 'AdminController@show_add');
    Route::get('/event/update/{id}', 'AdminController@show_update');
    Route::get('/event/{id}', 'AdminController@show_event');
    Route::get('/home', 'AdminController@show_home');
    Route::get('/event/{id}/message', 'AdminController@show_add_message');
    Route::get('/entries', 'AdminController@show_entries');
    // POST
    Route::post('/event/add', 'AdminController@do_add');
    Route::post('/event/update/{id}', 'AdminController@do_update');
    Route::post('/event/delete/{id}', 'AdminController@do_delete');
    Route::post('/event/{id}/message', 'AdminController@do_add_message');
    Route::post('/event/{id}/message/delete', 'AdminController@do_delete_message');
});
// Users
Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => ['session.auth']], function () {
    // Controllers Within The "App\Http\Controllers\User" Namespace
    // GET
    Route::get('/home', 'UserController@show_home');
    Route::get('/settings', 'UserController@show_settings');
    Route::get('/entries', 'UserController@show_entries');
    Route::get('/play', 'UserController@show_play');
    // POST
    Route::post('/settings/general', 'UserController@do_general_settings');
    Route::post('/settings/security', 'UserController@do_security_settings');
    Route::post('/play', 'UserController@do_play');
});
// Events
Route::group(['namespace' => 'Event', 'prefix' => 'event'], function () {
    // Controllers Within The "App\Http\Controllers\Event" Namespace
    // GET
    Route::get('/{id}', 'EventController@show_byid');
    Route::get('/', 'EventController@show_all');
    // POST
    Route::post('/register', 'EventController@do _register')->middleware('session.auth');
});