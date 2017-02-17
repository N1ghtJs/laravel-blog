@extends('layouts.app2')

@section('title', "$article->title")

@section('content')
<!-- 文章信息 -->
<div class="z-panel">
    <div class="z-panel-header">
        <h3>{{ $article->title }}</h3>
        <span>浏览：{{ $article->view }}</span>
        <span>评论：{{ $article->comment }}</span>
        <span>时间: {{ $article->created_at }}</span>
    </div>
    <div class="z-panel-body" style="padding:20px;">
        {!! $article->content !!}
    </div>
</div>
@endsection
