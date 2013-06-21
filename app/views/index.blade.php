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
    <h4 class="question-title"><a href="<?php echo URL::to('question', $question->id); ?>"><?php echo HTML::entities($question->title); ?></a></h4>
    <div class="question-content">
        <?php echo nl2br(HTML::entities(Str::limit($question->content, 200))); ?>
    </div>
    @endforeach
</div>
@stop

