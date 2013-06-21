<?php

class QuestionController extends BaseController
{
    protected $layout = 'layouts.default';

    public function __construct()
    {
        $this->beforeFilter('auth', array('only'=>array('getAsk')));
        $this->beforeFilter('guest', array('only'=>array()));
    }

    public function getAsk()
    {
        return View::make('question.ask');
    }

    public function postAsk()
    {
        $validator = Question::validate(Input::all());
        if($validator->fails()){
            return Redirect::to('question/ask')->withErrors($validator)->withInput();
        }else{
            $question = new Question();
            $question->title = Input::get('title');
            $question->content = Input::get('content');
            $question->user_id = Auth::user()->id;
            $tags = Input::get('tags');
            if(is_string($tags))
                $tags = array($tags);
            $question->addTags($tags);
            $question->save();
            return Redirect::action('QuestionController@question', array($question->id));
        }
    }

    public function question($id)
    {
        $question = Question::findOrFail($id);
        return View::make('question.question', array('question'=>$question));
    }
}