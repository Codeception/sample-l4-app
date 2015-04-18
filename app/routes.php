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
Route::get('/', function() {
   Log::error('hello'.uniqid());
   return View::make('hello');
});

Route::get('/flash', function() {
   Session::flash('message', 'Its a flash');
   return View::make('hello');
});

Route::resource('posts', 'PostsController');

Route::group(['prefix' => 'api'], function()
{
    Route::resource('posts', 'Api\PostsController');
});

Route::get('/back', function()
{
	return Redirect::back();
});
