<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '管理后台') - lhz的个人主页</title>

    <!-- icon -->
    <link rel="shortcut icon" href="/img/favicon.ico" />
    <link rel="bookmark" href="/img/favicon.ico" type="image/x-icon"　/>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    @yield('styles')

    <!-- Scripts -->
</head>
<body >
        {{--左侧垂直菜单栏--}}
        <div class="z-admin-menu">
            <div class="header">
                <!-- 电脑显示(>768px) -->
                <div class="hidden-xs">
                    <a href="{{ route('admin') }}">管理后台</a>
                </div>
                <!-- 手机显示(<768px) -->
                <div class="visible-xs-block">
                    <a href="{{ route('admin') }}"><span class="glyphicon glyphicon-cog"></span></a>
                </div>
            </div>
            <ul CLASS="list">
                <!-- 电脑显示 (>768px) -->
                <div class="hidden-xs">
                    <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-cog"></span>返回首页</a></li>
                    <li><a href="{{ route('article.index') }}"><span class="glyphicon glyphicon-cog"></span>文章管理</a></li>
                </div>
                <!-- 手机显示(<768px) -->
                <div class="visible-xs-block">
                    <li><a href="{{ route('home') }}">首页</a></li>
                    <li><a href="{{ route('article.index') }}">文章</a></li>
                </div>
            </ul>
        </div>
        {{--右侧内容区--}}
        <div class="z-admin-box">
            <div class="header">

            </div>
            <div class="content">
                @include('shared.messages')
                @yield('content')
            </div>

        </div>
</body>
<!-- Scripts -->
<script src="/js/app.js"></script>
@yield('scripts')
</html>
