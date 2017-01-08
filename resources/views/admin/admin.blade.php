<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        <div class="header">管理后台</div>
        <ul CLASS="list">

            <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-cog"></span>面板</a></li>

            <li><a href="#article-admin" data-toggle="collapse"><span class="glyphicon glyphicon-cog"></span>文章管理</a></li>
            <ul id="article-admin" class="collapse">
                <li><a href="{{ url('admin') }}">新增文章</a></li>
            </ul>


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
            @yield('content')
        </div>

    </div>
</body>
<!-- Scripts -->
<script src="/js/app.js"></script>
@yield('scripts')
</html>
