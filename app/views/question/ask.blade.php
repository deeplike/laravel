@extends('layouts.default')

@section('title')
提出新问题
@stop

@section('content')
<?php Form::macro('hasError', function ($key) use ($errors) {
    $html = '';
    if ($errors->has($key))
        $html = '<span class="help-inline">' . $errors->first($key) . '</span>';
    return $html;
}); ?>
<?php echo Form::open(); ?>
<div class="span8">
    <div class="row-fluid">
    <h4>提出新问题</h4>

    <div class="controls">
        <?php echo Form::text('title', Input::old('title'), array('class' => 'span12', 'placeholder' => '标题')); ?>
        <?php echo Form::hasError('title'); ?>
    </div>

    <div class="controls">
        <?php echo Form::textarea('content', Input::old('content'), array('class' => 'span12', 'placeholder' => '提问内容', 'rows'=>15)); ?>
        <?php echo Form::hasError('content'); ?>
    </div>
    </div>
</div>

<div class="span4">
    <div class="tag-box">
        <h4>问题标签</h4>

        <div class="input-append">
            <input id="appendedInputButton" type="text">
            <button class="btn" type="button">添加</button>
        </div>
        <ul class="inline">
            <li class="tag">objective-c</li>
            <li class="tag">php</li>
            <li class="tag">c++</li>
            <li class="tag">objective-c</li>
            <li class="tag">php</li>
            <li class="tag">c++</li>
            <li class="tag">objective-c</li>
            <li class="tag">php</li>
            <li class="tag">c++</li>
            <li class="tag">objective-c</li>
            <li class="tag">php</li>
            <li class="tag">c++</li>
            <li class="tag">objective-c</li>
            <li class="tag">php</li>
            <li class="tag">c++</li>
        </ul>
    </div>
    <input type="submit" value="提交" class="btn btn-block"/>
</div>
<?php echo Form::close(); ?>
@stop