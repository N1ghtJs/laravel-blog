@extends('layouts.app')

@section('title', '首页')

@section('content')
<div class="row">
    <div class="col-md-9">
        <!-- 文章列表 -->
        <div class="z-panel">
            <div class="z-panel-header" style="text-align: left;">
                文章列表
            </div>
            <div class="z-panel-body">
                @each('shared.article_little', $articles, 'article')
            </div>
        </div>

        {{ $articles->render() }}
    </div>

    <div class="col-md-3">
        <!-- 作者信息 -->
        @include('shared.author_info')

        <!-- 热门文章 -->
        @include('shared.article_hot')

        <!-- 最新留言 -->
        @include('shared.comment_new')
    </div>
</div>
@endsection
