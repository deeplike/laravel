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

Route::get('/', array('uses'=>'HomeController@index'));

Route::controller('account', 'AccountController');

Route::get('question/{id}', array('uses' => 'QuestionController@question'))->where('id', '[0-9]+');

Route::controller('question', 'QuestionController');

Event::listen('auth.login', function($user){
    $user->last_time = new DateTime();
    $user->save();
});

Event::listen('eloquent.saved: QuestionsTags', function($questionTag){
    $tag = Tag::find($questionTag->tag_id);
    if($tag){
        $tag->num_questions += 1;
        $tag->save();
    }
});