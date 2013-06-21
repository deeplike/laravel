<?php

Event::listen('auth.login', function($user){
    $user->last_time = new DateTime();
    $user->save();
});

Event::listen('eloquent.created: QuestionTag', function($questionTag){
    $tag = Tag::find($questionTag->tag_id);
    if($tag){
        $tag->num_questions += 1;
        $tag->save();
    }
});

Event::listen('eloquent.created: Question', function($question){
    $user = User::find($question->user_id);
    if($user){
        $user->num_questions += 1;
        $user->save();
    }
});

