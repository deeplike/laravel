@section('title')
登录
@stop

<h4>登录</h4>
<?php Form::macro('hasError', function($key) use($errors){
    $html = '';
    if($errors->has($key))
        $html = '<span class="help-inline">'.$errors->first($key).'</span>';
    return $html;
}); ?>
<?php echo Form::open(array('class'=>'form-horizontal')); ?>
<div class="control-group">
    <?php echo Form::label('email', 'E-mail', array('class'=>'control-label')); ?>
    <div class="controls">
        <?php echo Form::text('email', Input::old('email'), array('placeholder'=>'电子邮箱')); ?>
        <?php echo Form::hasError('email'); ?>
    </div>
</div>
<div class="control-group">
    <?php echo Form::label('password', '密码', array('class'=>'control-label')); ?>
    <div class="controls">
        <?php echo Form::password('password'); ?>
        <?php echo Form::hasError('password'); ?>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <?php echo Form::submit('登录', array('class'=>'btn')); ?>
    </div>
</div>
<?php echo Form::close(); ?>