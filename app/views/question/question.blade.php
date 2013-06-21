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
    <h3><?php echo $question->title; ?></h3>
    <div class="question-content">
        <?php echo nl2br(HTML::entities($question->content)); ?>
    </div>
</div>
@stop

@section('secondary')
<div class="span4">

</div>
@stop