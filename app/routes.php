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
   return View::make('hello');
});

Route::group(array('before' => 'auth.basic'), function()
{
    Route::resource('posts', 'PostsController');    
});

Route::get('/back', function()
{
	return Redirect::back();
});