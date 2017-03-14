@extends('layouts.app2')

@section('title', '首页')

@section('content-left')
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
    <div class="z-panel-footer">
        <a href="{{ route('article.list') }}">查看更多文章>></a>
    </div>
</div>
@endsection
