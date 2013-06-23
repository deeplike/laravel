<!DOCTYPE html>
<html>
<head>
    <title>My Site - @yield('title')</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo URL::asset('css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo URL::asset('css/default.css'); ?>" rel="stylesheet" media="screen">
    <script src="<?php echo URL::asset('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('js/bootstrap.js'); ?>"></script>
</head>
<body>
<div id="header">
    <div class="navbar navbar-static-top">
        <div class="navbar-inner">
            <div class="container">
                <?php HTML::macro('navMenuItem', function ($url, $title, $subMenus = array()) {
                    $url = URL::to($url);
                    $html = '<li';
                    $class = array();
                    if ($url == URL::current())
                        $class[] = 'active';
                    if ($subMenus)
                        $class[] = 'dropdown';
                    if ($class)
                        $html .= ' class="' . implode(' ', $class) . '"';
                    $html .= '>';
                    $html .= $subMenus ? HTML::link('#', $title, array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')) : HTML::link($url, $title);
                    if ($subMenus) {
                        $html .= '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">';
                        foreach ($subMenus as $subTitle => $subUrl) {
                            $html .= '<li><a tabindex="-1" href="' . Url::to($subUrl) . '">' . $subTitle . '</a></li>';
                        }
                        $html .= '</ul>';
                    }
                    $html .= '</li>';
                    return $html;
                }); ?>

                <a class="brand" href="<?php echo URL::to('/'); ?>">MY APP</a>

                <a href="{{URL::to('question/ask')}}" class="btn btn-primary">提问</a>
                <ul class="nav">
                    <?php echo HTML::navMenuItem('/', '首页'); ?>
                </ul>
                <ul class="nav pull-right">
                    <?php if (!Auth::check()): ?>
                        <?php echo HTML::navMenuItem('account/signup', '注册'); ?>
                        <?php echo HTML::navMenuItem('account/signin', '登录'); ?>
                    <?php else: ?>
                        <li class="avatar">{{HTML::image(Auth::user()->avatar ? Auth::user()->avatar :
                            URL::asset('images/default_avatar.png'), Auth::user()->name)}}
                        </li>
                        <?php echo HTML::navMenuItem('account/profile', Auth::user()->name, array(
                            '帐号设置' => 'account/profile',
                            '退出' => 'account/signout'
                        )); ?>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="row">
            @yield('content')
            @yield('secondary')
        </div>
    </div>
</div>

</body>
</html>