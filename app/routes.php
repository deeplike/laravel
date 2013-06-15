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

Route::get('/', function()
{
	return View::make('layouts.default')->nest('content', 'hello');
});

//Route::get('account/signup', function()
//{
//    return View::make('layouts.default')->nest('content', 'hello');
//});
//
//Route::get('account/signin', function()
//{
//    return View::make('layouts.default')->nest('content', 'hello');
//});

Route::controller('account', 'AccountController');

Event::listen('auth.login', function($user){
    $user->last_time = new DateTime();
    $user->save();
});