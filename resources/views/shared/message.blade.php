<!-- 留言 -->
@if( $message->user_id == 0)
    <p><b>一位不愿透露姓名的用户</b><span style="float:right">{{ $message->id  }} 楼</span></p>
@else
    <p><b>{{ $message->user->name }}</b><span style="float:right">{{ $message->id  }} 楼</span></p>
@endif
<p>{{ $message->content }}</p>
<p>{{ $message->created_at }}</p>
<!-- <a href="#">回复待完成</a> -->
<hr>
