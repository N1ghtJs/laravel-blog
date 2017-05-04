<!-- 留言 -->
<div class="z-comment">
    @if( $message->user_id == 0)
        <p><b>匿名</b><span style="float:right">{{ $message->id  }} 楼</span></p>
    @else
        <p><b>{{ $message->user->name }}</b><span style="float:right">{{ $message->id  }} 楼</span></p>
    @endif
    <p>{{ $message->content }}</p>
    <p>{{ $message->created_at }}</p>
    <!-- <a href="#">回复待完成</a> -->
    <hr>
</div>
