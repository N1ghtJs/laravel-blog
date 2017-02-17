@extends('layouts.app2')

@section('title', '文章')

@section('content')
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

@endsection
