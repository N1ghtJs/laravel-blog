@extends('layouts.app_2columns')

@section('title', "$article->title")

@section('styles')
<style media="screen">
    /*回复限高*/
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
<div class="z-panel">
    <div class="z-panel-header">
        <h3>{{ $article->title }}</h3>
        <span class="glyphicon glyphicon-eye-open"></span><span style="margin-right:10px"> {{ $article->view }}</span>
        <span class="glyphicon glyphicon-edit"></span><span style="margin-right:10px"> {{ $article->comment }}</span>
        <span class="glyphicon glyphicon-time"></span><span> {{ $article->created_at }}</span>
    </div>
    <div class="z-panel-body" style="padding:20px;">
        <!-- 文章内容显示 markdown -->
        <div id="markdownContent" class="markdown">
            加载中...
        </div>

        <!-- 评论表单-->
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

        <!-- 评论列表 -->
        <p style="padding-top:30px;"><b>评论</b></p><hr>
        @foreach($comments as $comment)
            <!-- 评论 -->
            <div class="z-comment">
                @if( $comment->user_id == 1)
                    <p><b>{{ $comment->user->name }}</b><span class="label label-primary" style="margin-left:5px">博主</span></p>
                @else
                    <p><b>{{ $comment->user->name }}</b></p>
                @endif
                <p>{{ $comment->content }}</p>
                <p>{{ $comment->created_at }} <a href="javascript:;" style="float:right" id="replyButton" data-comment-id="{{ $comment->id }}">回复</a></p>

                <!-- 回复列表 -->
                <div class="reply" style="margin-left:30px">
                    <div class="replyList" id="replyLists{{$comment->id}}">
                        @if(count($comment->replys) > 0)
                            <div class="" style="padding-top:10px;border-top:1px solid #e2e1e1">
                            @foreach ($comment->replys as $reply)
                                <p>
                                    <span>
                                        @if( $reply->user_id == 1)
                                            <b>{{ $reply->user->name }}</b><span class="label label-primary" style="margin-left:5px">博主</span>
                                        @else
                                            <b>{{ $reply->user->name }}</b>
                                        @endif
                                    </span>
                                    <span>：{{ $reply->content }}</span>
                                </p>
                                <p style="color:gray;font-size:13px"> {{ $reply->created_at }}</p>
                            @endforeach
                            <a href="javascript:;" id="replyButton" data-comment-id="{{ $comment->id }}">我也说一句..</a>
                            </div>
                        @endif
                    </div>
                    <!-- AJAX 表单 -->
                    <form class="form-inline" id="replyForm{{$comment->id}}" style="display:none">
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <input type="text" name="content" class="form-control">
                        @if(Auth::check())
                            <a class="btn btn-default" id="replyAJAX" data-comment-id="{{$comment->id}}">确定</a>
                        @else
                            <a class="btn btn-primary" href="{{ url('/login') }}">登录后发表</a>
                        @endif
                    </form>
                    <!-- <form action="{{ route('replys.store') }}" method="post" id="replyForm{{$comment->id}}" class="form-inline" style="display:none">
                        {{ csrf_field() }}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <input type="text" name="content" class="form-control">
                        <button type="submit" class="btn btn-default">确定</button>
                    </form> -->
                </div>
                <hr>
            </div>
        @endforeach

        <!-- 我要评论按钮 -->
        <a href="#comment-form">我要评论</a>
    </div>
</div>
{{ $comments->render() }}
@endsection

@section('script')
<script>
$(document).ready(function(){
    //显示文章内容（必须用AJAX，否则包含 script 代码的内容会被服务器拦截）
    $('#markdownContent').html()
    $.ajax({
        url: "/markdown/{{ $article->id }}",
        type: "get",
        success: function(res){
            //console.log(res);
            $('#markdownContent').html(res);
        },
        error: function(err){
            console.log(err.responseText);
        }
    });
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
                //刷新页面
                location.reload();
            },
            error: function(err){
                console.log(err.responseText);
            }
        });
    });

});
</script>
@endsection
