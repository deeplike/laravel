<?php


class Tag extends Eloquent {

    private static $rules = array(
        'name' => 'required|alpha_dash|max:10|unique:tags',
    );

    public static function validate(array $data)
    {
        return validator::make($data, self::$rules);
    }

}

