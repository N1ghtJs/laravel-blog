<!-- 评论 -->
<div class="z-comment">
    <p><b>{{ $comment->user->name }}</b></p>
    <p>{{ $comment->content }}</p>
    <p>{{ $comment->created_at }} <a href="javascript:;" style="float:right" id="replyButton" data-comment-id="{{ $comment->id }}">回复</a></p>


    <div class="reply" style="margin-left:30px">
        <div class="replyList" id="replyLists{{$comment->id}}">
            @if(count($comment->replys) > 0)
                <div class="" style="padding-top:10px;border-top:1px solid #e2e1e1">
                @foreach ($comment->replys as $reply)
                    <p>
                        <span>
                            <b>{{ $reply->user->name }}</b>
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
