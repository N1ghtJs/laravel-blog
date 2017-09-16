@extends('layouts.app_2columns')

@section('title', "留言板")

@section('content-left')

<!-- 错误提示信息 -->
@include('shared.errors')


<div class="z-panel">
    <div class="z-panel-header" style="text-align: left;">
        留言板
    </div>
    <div class="z-panel-body" style="padding:15px;">

        <!-- 主人寄语 -->
        <b>主人寄语</b><hr>
        <img src="/img/message/message.jpg" class="img-responsive" style="margin-left:auto;margin-right:auto;">
        <p style="text-align:center;margin-top:20px;"><b>如今，一个人再 NB 的日子，还是不如当初一起 SB 的日子</b></p>

        <!-- 发表留言表单 -->
        <h5 id="message-form" style="padding-top:30px;">发表您的留言</h5>
        <form action="{{ route('messages.store') }}" method="post" >
            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" rows="3" name="content" placeholder="不超过120字"></textarea>
            </div>
            @if(Auth::check())
                <button type="submit" class="btn btn-default">发表</button>
            @else
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#warning">
                  匿名发表
                </button>
                <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">提示：</h4>
                      </div>
                      <div class="modal-body">
                        请勿回复类似 “123” 这样的无意义的留言哦，否则将会被删除，谢谢~
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">确认</button>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="btn btn-primary" style="margin-left:10px" href="{{ url('/login') }}">登录后发表</a>
            @endif
        </form>

        <!-- 留言列表 -->
        <p style="padding-top:30px;"><b>留言</b></p><hr>
        @foreach ($messages as $message)

            <div class="z-comment">
                @if( $message->user_id == 0)
                    <p><b>匿名</b><span style="float:right">{{ $message->id  }} 楼</span></p>
                @elseif( $message->user_id == 1)
                    <p><b>{{ $message->user->name }}</b><span class="label label-primary" style="margin-left:5px">博主</span><span style="float:right">{{ $message->id  }} 楼</span></p>
                @else
                    <p><b>{{ $message->user->name }}</b><span style="float:right">{{ $message->id  }} 楼</span></p>
                @endif
                <p>{{ $message->content }}</p>
                <p>
                    {{ $message->created_at }}
                    @if (Auth::check())
                        @if (Auth::id() === 1)
                            <a href="javascript:;" style="float:right" id="replyButton" data-message-id="{{ $message->id }}">回复</a>
                        @endif
                    @endif
                </p>

                <!-- 回复 -->
                <div class="reply" style="margin-left:30px">
                    <div class="replyList" id="replyLists{{$message->id}}">
                        @if(count($message->remessages) > 0)
                            <div class="" style="padding-top:10px;border-top:1px solid #e2e1e1">
                            @foreach ($message->remessages as $remessage)
                                <p>
                                    <span>
                                        @if( $remessage->user_id == 0)
                                            <b>匿名</b>
                                        @elseif( $remessage->user_id == 1)
                                            <b>{{ $remessage->user->name }}</b><span class="label label-primary" style="margin-left:5px">博主</span>
                                        @else
                                            <b>{{ $remessage->user->name }}</b>
                                        @endif
                                    </span>
                                    <span>：{{ $remessage->content }}</span>
                                </p>
                                <p style="color:gray;font-size:13px"> {{ $remessage->created_at }}</p>
                            @endforeach
                            @if (Auth::check())
                                @if (Auth::id() === 1)
                                    <a href="javascript:;" id="replyButton" data-message-id="{{ $message->id }}">我也说一句..</a>
                                @endif
                            @endif
                            </div>
                        @endif
                    </div>

                    @if (Auth::check())
                        @if (Auth::id() === 1)
                            <!-- AJAX 表单 -->
                            <form class="form-inline" id="replyForm{{$message->id}}" style="display:none">
                                <input type="hidden" name="message_id" value="{{$message->id}}">
                                <input type="text" name="content" class="form-control">
                                @if(Auth::check())
                                    <a class="btn btn-default" id="replyAJAX" data-message-id="{{$message->id}}">确定</a>
                                @else
                                    <a class="btn btn-primary" href="{{ url('/login') }}">登录后发表</a>
                                @endif
                            </form>
                        @endif
                    @endif

                    <!-- <form action="{{ route('remessages.store') }}" method="post" id="replyForm{{$message->id}}" class="form-inline" style="display:none">
                        {{ csrf_field() }}
                        <input type="hidden" name="message_id" value="{{$message->id}}">
                        <input type="text" name="content" class="form-control">
                        <button type="submit" class="btn btn-default">确定</button>
                    </form> -->
                </div>
                <hr>
            </div>
        @endforeach

        <!-- 我要留言按钮 -->
        <a href="#message-form">我要留言</a>
    </div>
</div>
{{ $messages->render() }}

@endsection

@section('script')
<script>
$(document).ready(function(){
    //显示回复框函数
    $('a#replyButton').click(function(){
        //获取点击的 message id
        var message_id = $(this).attr('data-message-id');

        //显示相应的回复表单
        $('#replyForm' + message_id).show();
    });
    //AJAX 回复
    $('a#replyAJAX').click(function(){
        //获取点击的 message id
        var message_id = $(this).attr('data-message-id');

        //获取表单值
        var form_data = $('#replyForm' + message_id).serialize();

        //AJAX 存储
        $.ajax({
            url: "{{ route('remessages.store') }}",
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
