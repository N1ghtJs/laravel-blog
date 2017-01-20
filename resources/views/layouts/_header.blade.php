<nav class="navbar navbar-default navbar-static-top z-nav">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('home') }}">
                首页
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav" style="font-size: 15px;">
                <li><a href="{{ route('article.list') }}">文章</a></li>

                @if (Auth::check())
                    @if (Auth::id() === 1)
                        <li><a href="{{ route('admin') }}">管理后台</a></li>
                    @endif
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left search" role="search" action="{{ route('article.search') }}" method="get">
                    <div class="form-group">
                        <span class="glyphicon glyphicon-search"></span>
                        <input type="text" name="key" style="background-color: transparent;border: none;" placeholder="搜索">
                    </div>
                </form>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录</a></li>
                    <li><a href="{{ url('/register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="z-imax-img" style="margin-bottom: 20px;">
    <img src="/img/header.jpg" alt="">
</div>
