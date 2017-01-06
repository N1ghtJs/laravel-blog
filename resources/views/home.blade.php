@extends('layouts.app')

@section('title', '首页')

@section('content')
<div class="z-body-two-column">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <!-- 轮播 -->
                @include('shared.slides')

                <!-- 最新文章 -->
                <div class="z-panel">
                    <div class="z-panel-header" style="text-align: left;">
                        最新文章
                    </div>
                    <div class="z-panel-body">
                        @include('shared.article')
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <!-- 作者信息 -->
                @include('shared.author_info')

                <!-- 热门文章 -->
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

                <!-- 最新留言 -->
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
