<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('backlog', 'BacklogController@index');
Route::get('backlog/story/{id}', 'BacklogController@show');
Route::put('backlog/story/{id}', 'BacklogController@update');
Route::post('backlog', 'BacklogController@store');
Route::delete('backlog/story/{id}', 'BacklogController@destroy');
