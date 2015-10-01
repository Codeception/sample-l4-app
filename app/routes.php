<?php
Route::get('', ['domain' => 'example.com', 'as' => 'domain', 'uses' => 'HomeController@domain']);
Route::get('', ['domain' => 'subdomain.example.com', 'as' => 'subdomain', 'uses' => 'HomeController@subdomain']);
Route::get('', ['domain' => '{w}.example.com', 'as' => 'wildcard', 'uses' => 'HomeController@wildcard']);
Route::get('', ['domain' => '{w1}.{w2}.example.com', 'as' => 'multiple-wildcards', 'uses' => 'HomeController@multipleWildcards']);

Route::get('/', 'HomeController@index');
Route::get('flash', 'HomeController@flash');
Route::get('back', 'HomeController@back');
Route::get('/secure', ['before' => 'auth', 'uses' => 'HomeController@secure']);
Route::get('session/{message}', 'HomeController@session');
Route::get('special-characters', 'HomeController@specialCharacters');
Route::match(['get', 'post'], 'form', 'HomeController@form');

Route::resource('posts', 'PostsController');
Route::resource('api/posts', 'Api\PostsController');
Route::resource('users', 'UsersController');

Route::controller('auth', 'AuthController');
