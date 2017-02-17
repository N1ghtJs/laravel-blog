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
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    {{--左侧垂直菜单栏--}}
    <div class="z-admin-menu">
        <div class="header">
            <a href="{{ route('admin') }}">管理后台</a>
        </div>
        <ul CLASS="list">

            <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-cog"></span>返回首页</a></li>

            <li><a href="{{ route('article.index') }}"><span class="glyphicon glyphicon-cog"></span>文章管理</a></li>


            <li><a href="#collapse2" data-toggle="collapse"><span class="glyphicon glyphicon-cog"></span>菜单3</a></li>
            <ul id="collapse2" class="collapse">
                <li><a href="">菜单31</a></li>
                <li><a href="">菜单32</a></li>
                <li><a href="">菜单33</a></li>
                <li><a href="">菜单31</a></li>
                <li><a href="">菜单32</a></li>
                <li><a href="">菜单33</a></li>
                <li><a href="">菜单31</a></li>
                <li><a href="">菜单32</a></li>
                <li><a href="">菜单33</a></li>
                <li><a href="">菜单31</a></li>
                <li><a href="">菜单32</a></li>
                <li><a href="">菜单33</a></li>
                <li><a href="">菜单31</a></li>
                <li><a href="">菜单32</a></li>
                <li><a href="">菜单33</a></li>
                <li><a href="">菜单31</a></li>
                <li><a href="">菜单32</a></li>
                <li><a href="">菜单33</a></li>
                <li><a href="">菜单31</a></li>
                <li><a href="">菜单32</a></li>
                <li><a href="">菜单33</a></li>
            </ul>
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
