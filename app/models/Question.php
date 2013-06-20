<?php

class Question extends Eloquent{

    public static $rules = array(
        'title'=>'required|between:5,32',
        'content'=>'required|between:10,1024',
        'tags'=>'required',
    );

    public static function validate(array $data)
    {
        return Validator::make($data, self::$rules);
    }

    public function addTags(array $tags)
    {
        $rule = array(
            'tag'=>'required|alpha_dash|max:10'
        );
        foreach ($tags as $tag) {

        }

    }
}
