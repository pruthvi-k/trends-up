<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('trends/trends');
});

Route::get('/hotspot', 'HotspotController@index');
Route::post('/hotspot', 'HotspotController@save');
Route::get('/get/hotspot', 'HotspotController@getJson');

Route::get('test', 'TrendsController@index');
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::post('send', 'ChatController@send');
Route::get('write', 'ChatController@write');
