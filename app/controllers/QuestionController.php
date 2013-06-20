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
}