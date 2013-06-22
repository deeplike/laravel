<?php

/**
 * Class QuestionTag
 * @property Tag $tag
 */

class QuestionTag extends Eloquent {
    protected $table = 'questions_tags';

    private static $rules = array(
        'question_id'=>'required|exists:questions,id',
        'tag_id'=>'required|exists:tags,id',
    );

    public static function validate(array $data)
    {
        return Validator::make($data, self::$rules);
    }

    public function tag()
    {
        return $this->belongsTo('Tag');
    }

}

