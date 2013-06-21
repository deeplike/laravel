<?php


class QuestionsTags extends Eloquent {

    private static $rules = array(
        'question_id'=>'required|exists:questions,id',
        'tag_id'=>'required|exists:tags,id',
    );

    public static function validate(array $data)
    {
        return Validator::make($data, self::$rules);
    }

}

