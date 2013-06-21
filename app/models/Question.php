<?php

/**
 * Class Question
 * @property integer $id
 * @property string $title
 * @property string $content
 */

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
        Event::listen('eloquent.saved: Question', function($question) use ($tags){
            foreach ($tags as $tagName) {
                $tag = Tag::where('name', '=', $tagName)->first();
                if(!$tag){
                    $tag = $question->addTag($tagName);
                }
                $tag && $question->addQuestionTag($question, $tag);
            }
        });
    }

    public function addTag($tagName)
    {
        $validator = Tag::validate(array('name'=>$tagName));
            if($validator->passes()){
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
            return $tag;
        }
        return false;
    }

    public function addQuestionTag(Question $question,Tag $tag)
    {
        $validator = QuestionTag::validate(array(
            'question_id'=>$this->id,
            'tag_id'=>$tag->id,
        ));
        if($validator->passes()){
            $questionTag = new QuestionTag();
            $questionTag->question_id = $question->id;
            $questionTag->tag_id = $tag->id;
            $questionTag->save();
        }
    }
}
