@extends('layouts.default')

<?php
/**
 * @var $question Question
 */
?>

@section('title')
<?php echo $question->title; ?>
@stop

@section('content')
<div class="span8">
    <ul class="inline tag-box">
        <?php foreach ($question->questionsTags as $questionTag): ?>
            <li class="tag"><a href="#"><?php echo $questionTag->tag->name; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <h4 class="question-title"><?php echo $question->title; ?>@if(Auth::check() && $question->user_id == Auth::user()->id) <a href="<?php echo URL::to('question/edit', array($question->id)); ?>">(修改)</a> @endif</h4>
    <div class="question-content">
        <?php echo nl2br(HTML::entities($question->content)); ?>
    </div>
</div>
@stop

@section('secondary')
<div class="span4">

</div>
@stop