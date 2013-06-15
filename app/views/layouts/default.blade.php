<!DOCTYPE html>
<html>
<head>
    <title>My Site - @yield('title')</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo URL::asset('css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo URL::asset('css/default.css'); ?>" rel="stylesheet" media="screen">
</head>
<body>
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <?php HTML::macro('navMenuItem', function($url, $title, $subMenus = []){
                $url = URL::to($url);
                $html = '<li';
                $class = [];
                if($url == URL::current())
                    $class[] = 'active';
                if($subMenus)
                    $class[] = 'dropdown';
                if($class)
                    $html .= ' class="'.implode(' ', $class).'"';
                $html .= '>';
                $html .= $subMenus ? HTML::link('#', $title, array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown')) : HTML::link($url, $title);
                if($subMenus){
                    $html .= '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">';
                    foreach($subMenus as $subTitle => $subUrl){
                        $html .= '<li><a tabindex="-1" href="'.Url::to($subUrl).'">'.$subTitle.'</a></li>';
                    }
                    $html .= '</ul>';
                }
                $html .= '</li>';
                return $html;
            }); ?>

            <div class="nav-collapse collapse">
                <ul class="nav">
                    <?php echo HTML::navMenuItem('/', '首页'); ?>
                </ul>
                <ul class="nav pull-right">
                    <?php if(!Auth::check()): ?>
                        <?php echo HTML::navMenuItem('account/signup', '注册'); ?>
                        <?php echo HTML::navMenuItem('account/signin', '登录'); ?>
                    <?php else: ?>
                        <?php echo HTML::navMenuItem('account/profile', Auth::user()->name, array(
                            '帐号设置'=>'account/profile',
                            '退出'=>'account/signout'
                        )); ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="header">
    <div class="container">
        <div class="row">
            <div class="span2"><div class="logo">马仕荣</div></div>
            <div class="span10">
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span9">
                <?php echo $content; ?>
            </div>
            <div class="span3">
                <h4>sidebar</h4>
                @yield('sidebar')
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL::asset('js/jquery.min.js'); ?>"></script>
<script src="<?php echo URL::asset('js/bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
    $('.dropdown-toggle').dropdown();
</script>
</body>
</html>