@extends('layouts.default')

@section('title')
注册
@stop

@section('content')
<div class="span12">
    <h4>注册</h4>

    <?php echo Form::open(array('class' => 'form-horizontal')); ?>
    <div class="control-group">
        <?php echo Form::label('email', 'E-mail', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo Form::text('email', Input::old('email'), array('placeholder' => '电子邮箱')); ?>
            @if($errors->has('email'))
            <span class="help-inline">{{$errors->first('email')}}</span>
            @endif
        </div>
    </div>
    <div class="control-group">
        <?php echo Form::label('password', '密码', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo Form::password('password'); ?>
            @if($errors->has('password'))
            <span class="help-inline">{{$errors->first('password')}}</span>
            @endif
        </div>
    </div>
    <div class="control-group">
        <?php echo Form::label('password_confirmation', '确认密码', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo Form::password('password_confirmation'); ?>
            @if($errors->has('password_confirmation'))
            <span class="help-inline">{{$errors->first('password_confirmation')}}</span>
            @endif
        </div>
    </div>
    <div class="control-group">
        <?php echo Form::label('name', '昵称', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo Form::text('name', Input::old('name'), array('placeholder' => '昵称')); ?>
            @if($errors->has('name'))
            <span class="help-inline">{{$errors->first('name')}}</span>
            @endif
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo Form::submit('注册', array('class' => 'btn')); ?>
        </div>
    </div>
    <?php echo Form::close(); ?>
</div>
@stop