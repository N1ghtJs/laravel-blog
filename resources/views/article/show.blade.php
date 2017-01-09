@extends('layouts.app')

@section('title', '首页')

@section('content')
<div class="row">
    <div class="col-md-9">
        <!-- 文章信息 -->
        <div class="z-panel">
            <div class="z-panel-header">
                <h3>{{ $article->title }}</h3>
                <span>浏览：{{ $article->view }}</span>
                <span>评论：{{ $article->comment }}</span>
                <span>时间: {{ $article->created_at }}</span>
            </div>
            <div class="z-panel-body" style="padding:20px;">
                <img src="/img/article/2.jpg" style="width: 100%; margin-bottom:20px;">
                {!! $article->content !!}
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
@endsection
