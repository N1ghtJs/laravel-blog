@extends('layouts.app2')

@section('title', "$article->title")

@section('styles')
<style media="screen">
    .replyList{
        max-height:300px;
        overflow-y:auto;
    }
    .replyList::-webkit-scrollbar {
      width: 8px;
    }
    .replyList::-webkit-scrollbar-thumb {
      background-color: #e2e1e1;
    }
</style>
@endsection

@section('content-left')
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
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-default">发表</button>
            @else
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                </div>
                <a class="btn btn-primary" href="{{ url('/login') }}">登录后发表</a>
            @endif
        </form>

        <p style="padding-top:30px;"><b>评论</b></p><hr>
        @each('shared.comment', $comments, 'comment')

        <a href="#comment-form">我要评论</a>
    </div>
</div>
{{ $comments->render() }}
@endsection

@section('script')
<script>
$(document).ready(function(){
    //显示回复框函数
    $('a#replyButton').click(function(){
        //获取点击的 comment id
        var comment_id = $(this).attr('data-comment-id');

        //显示相应的回复表单
        $('#replyForm' + comment_id).show();
    });
    //AJAX 回复
    $('a#replyAJAX').click(function(){
        //获取点击的 comment id
        var comment_id = $(this).attr('data-comment-id');

        //获取表单值
        var form_data = $('#replyForm' + comment_id).serialize();

        //AJAX 存储
        $.ajax({
            url: "{{ route('replys.store') }}",
            type: "post",
            data: form_data,
            success: function(res){
                console.log(res);
            },
            error: function(err){
                console.log(err.responseText);
            }
        });

        //刷新页面
        location.reload();
    });

});
</script>
@endsection
