<?php
//Route::get('socket', 'Focalworks\ChatApp\Http\Controllers\ChatController@index');
Route::post('sendmessage', 'Focalworks\ChatApp\Http\Controllers\ChatController@sendMessage');
Route::get('writemessage', 'Focalworks\ChatApp\Http\Controllers\ChatController@writemessage');