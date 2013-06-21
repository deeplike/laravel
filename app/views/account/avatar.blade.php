@extends('layouts.default')

@section('title')
修改头像
@stop

<?php
$user = Auth::user();
/**
 * @var $user User
 */
?>

@section('content')
<div class="span12">
    <h4>上传头像</h4>

    @if($errors->has('avatar'))
    <div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>{{$errors->first('avatar')}}</div>
    @endif

    <div class="">
        {{HTML::image($user->avatar ? $user->avatar : URL::asset('images/default_avatar.png'), $user->name,
        array('class'=>'img-rounded avatar-64'))}}
    </div>

    <?php echo Form::open(array('files' => true)); ?>

    <div class="mt10">
        <?php echo Form::file('avatar', array('title' => '选择头像')) ?>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn">取消</button>
    </div>

    <?php Form::close(); ?>
</div>
@stop