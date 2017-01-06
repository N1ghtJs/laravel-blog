@extends('layouts.app')

@section('title', '首页')

@section('content')
<div class="z-body-two-column">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @yield('left-content')
            </div>
            <div class="col-md-3">
                @include('shared.author_info')
                <div class="z-panel">
                    <div class="z-panel-header">
                        热门文章
                    </div>
                    <div class="z-panel-body">
                        <ul>
                            <li>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</li>
                            <li>bbb</li>
                            <li>ccc</li>
                            <li>ddd</li>
                            <li>eee</li>
                        </ul>
                    </div>
                </div>
                <div class="z-panel">
                    <div class="z-panel-header">
                        最新留言
                    </div>
                    <div class="z-panel-body">
                        <ul>
                            <li><span>dlflj</span>：aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</li>
                            <li>bbb</li>
                            <li>ccc</li>
                            <li>ddd</li>
                            <li>eee</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
