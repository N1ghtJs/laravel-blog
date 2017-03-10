@extends('layouts.app2')

@section('title', "$article->title")

@section('content')
<!-- 文章信息 -->
<div class="z-panel">
    <div class="z-panel-header">
        <h3>{{ $article->title }}</h3>
        <span class="glyphicon glyphicon-eye-open"></span><span style="margin-right:10px"> {{ $article->view }}</span>
        <span class="glyphicon glyphicon-edit"></span><span style="margin-right:10px"> {{ $article->comment }}</span>
        <span class="glyphicon glyphicon-time"></span><span> {{ $article->created_at }}</span>
    </div>
    <div class="z-panel-body" style="padding:20px;">
        <!-- 文章内容显示 markdown -->
        <div class="markdown">
            {!! $article->content !!}
        </div>

        <!-- 评论显示区 -->
        <hr style="margin-top:30px;">
        <h5 id="comment-form">发表您的评论</h5>
        <form action="{{ route('comments.store') }}" method="post" >
            {{ csrf_field() }}
            @if(Auth::check())
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-default">发表</button>
            @else
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <input type="hidden" name="user_id" value="0">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-default">匿名发表</button><a class="btn btn-primary" style="margin-left:10px" href="{{ url('/login') }}">登录</a>
            @endif
        </form>

        <p style="padding-top:30px;"><b>评论</b></p><hr>
        @each('shared.comment', $comments, 'comment')

        <a href="#comment-form">我要评论</a>
    </div>
</div>
{{ $comments->render() }}
@endsection
