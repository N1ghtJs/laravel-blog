{{-- 这是两栏布局视图模板：包含了导航栏、巨幕、作者信息侧栏、底部信息栏 --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '无标题') - lhz的博客</title>

    <!-- icon -->
    <link rel="shortcut icon" href="/img/favicon.ico" />
    <link rel="bookmark" href="/img/favicon.ico" type="image/x-icon"　/>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>

    @include('layouts._header')

    <div class="container">
        @include('shared.messages')
        <div class="row">
            <div class="col-md-9">
                <!-- 文章信息 -->
                @yield('content')
            </div>

            <div class="col-md-3">
                <!-- 作者信息 -->
                @include('shared.author_info')

                <!-- 热门文章 -->
                @include('shared.article_hot')

                <!-- 最新留言 -->
                @include('shared.comment_new')

                <!-- 友情链接 -->
                @include('shared.links')
            </div>
        </div>
        @include('layouts._footer')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
