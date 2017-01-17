@extends('layouts.app')

@section('title', '首页')

@section('content')
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
                @each('shared.article', $articles_new, 'article')
            </div>
        </div>
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
