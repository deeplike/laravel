@extends('layouts.default')

@section('title')
提出新问题
@stop

@section('content')
<?php echo Form::open(); ?>
<div class="span8">
    <div class="row-fluid">
        <h4>提出新问题</h4>

        <div class="controls">
            <?php echo Form::text('title', Input::old('title'), array('class' => 'span12', 'placeholder' => '标题')); ?>
            @if($errors->has('title'))
            <div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>{{$errors->first('title')}}</div>
            @endif
        </div>

        <div class="controls">
            <?php echo Form::textarea('content', Input::old('content'), array('class' => 'span12', 'placeholder' => '提问内容', 'rows' => 15)); ?>
            @if($errors->has('content'))
            <div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>{{$errors->first('content')}}</div>
            @endif
        </div>
    </div>
</div>

<div class="span4">
    <div class="tag-box">
        <h4>问题标签</h4>
        <ul class="new-tag-box inline">
        </ul>
        <div class="input-append">
            <input class="tag-input" type="text"/>
            <button class="btn" type="button">添加</button>
        </div>
        @if($errors->has('tags'))
        <div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>{{$errors->first('tags')}}</div>
        @endif
    </div>
    <input type="submit" value="提交" class="btn btn-block"/>
</div>
<?php echo Form::close(); ?>
<script type="text/javascript">
    var $tagBox = $('.tag-box');
    $tagBox.on('click', '.btn', function(){
        var tag = $tagBox.find('.tag-input').val();
        if(tag.length != 0){
            $tagBox.find('.new-tag-box').append('<li class="tag"><a href="#">' + tag + '</a> <i class=" icon-remove"></i><input type="hidden" name="tags[]" value="'+tag+'"/></li>\n');
            $tagBox.find('.tag-input').val('');
        }
    });
</script>
@stop