{{-- 这是带巨幕图的公共视图模板：包含了导航栏、巨幕、底部信息栏 --}}
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
    @yield('styles')
</head>
<body>

    @include('layouts._header')
    <div class="z-imax-img" style="margin-bottom: 20px;">
        <img src="/img/header.jpg" class="hidden-xs">
        <img src="/img/header-phone.jpg" class="visible-xs-block" style="width:100%;margin-top:50px">
    </div>

    <div class="container" id="app"> <!-- id = app : 开启 Vue.js-->
        @include('shared.messages')
        @yield('content')
        @include('layouts._footer')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('script')
</body>
</html>
