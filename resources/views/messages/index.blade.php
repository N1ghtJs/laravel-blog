@extends('layouts.app2')

@section('title', "留言板")

@section('content-left')

<!-- 错误提示信息 -->
@include('shared.errors')

<!-- 最新文章 -->
<div class="z-panel">
    <div class="z-panel-header" style="text-align: left;">
        留言板
    </div>
    <div class="z-panel-body" style="padding:15px;">
        <b>主人寄语</b><hr>
        <img src="/img/message/message.jpg" class="img-responsive" style="margin-left:auto;margin-right:auto;">
        <p style="text-align:center;margin-top:20px;"><b>如今，一个人再 NB 的日子，还是不如当初一起 SB 的日子</b></p>

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

        <p style="padding-top:30px;"><b>留言</b></p><hr>
        @each('shared.message', $messages, 'message')

        <a href="#message-form">我要留言</a>
    </div>
</div>
{{ $messages->render() }}



@endsection
