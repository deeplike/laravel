@extends('layouts.default')

<?php
/**
 * @var $question Question
 */
?>

@section('title')
Home
@stop

@section('content')
<div class="span8">
    @foreach ($questions as $question)
    <div class="row question-box">
        <div class="span1 avatar">
            <a href="#"><img class="avatar-48 img-rounded" src="<?php echo asset($question->user->avatar); ?>" alt=""/></a>
        </div>
        <div class="span7 question">
            <div class="source"><?php echo $question->user->name; ?> 发布该问题 <div class="pull-right" data-timestamp="{{$question->createdTimestamp}}">{{$question->createdTime}}</div></div>
        <div class="question-title">
            <a href="<?php echo URL::to('question', $question->id); ?>"><?php echo HTML::entities($question->title); ?></a>
        </div>
        <div class="question-meta">
            <a href="#" class="question-meta-item">关注问题</a>
            <a href="#">{{$question->num_replies}} 个回答</a>
        </div>
    </div>
</div>
@endforeach
</div>
@stop

@section('secondary')
<div class="span4">

</div>
@stop

