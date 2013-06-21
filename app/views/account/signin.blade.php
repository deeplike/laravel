@extends('layouts.default')

@section('title')
登录
@stop

@section('content')
<div class="span12">
    <h4>登录</h4>

    @if(Session::has('message'))
    <div class="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('message')}}
    </div>
    @endif

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
        <div class="controls">
            <?php echo Form::submit('登录', array('class' => 'btn btn-primary')); ?>
            <a class="btn btn-success" href="{{URL::to('account/signup')}}">注册</a>
        </div>
    </div>
    <?php echo Form::close(); ?>
</div>
@stop