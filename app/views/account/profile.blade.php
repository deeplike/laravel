@extends('layouts.default')

@section('title')
个人中心
@stop

<?php
$user = Auth::user();
/**
 * @var $user User
 */
?>

@section('content')
<div class="span12">
    <h4>帐号设置</h4>

    <div class="box">
        <div class="row-fluid">
            <div class="span12">
                {{$user->name}}
            </div>
        </div>
        <div class="row-fluid">
            <div class="span2">
                <a class="avatar-big" href="{{URL::to('account/avatar')}}">
                    {{HTML::image($user->avatar ? $user->avatar : URL::asset('images/default_avatar.png'), $user->name,
                    array('class'=>'img-rounded avatar-64'))}}
                </a>
                <a class="btn mt10" href="{{URL::to('account/avatar')}}">修改头像</a>
            </div>
            <div class="span10">
                <ul class="unstyled">
                    <li>入住时间：{{$user->created_at}}</li>
                    <li>更新时间：{{$user->updated_at}}</li>
                </ul>
            </div>
        </div>
        <div class="row-fluid mt10">
            <div class="span12 bt1 pt10">
                <ul class="inline">
                    <li class="description"><span class="title">问题数</span> {{$user->num_questions}}</li>
                    <li class="description"><span class="title">回答数</span> {{$user->num_replies}}</li>
                    <li class="description"><span class="title">评论数</span> {{$user->num_comments}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop