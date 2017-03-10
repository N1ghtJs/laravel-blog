<!-- 评论 -->
@if( $comment->user_id == 0)
    <p><b>一位不愿透露姓名的用户</b></p>
@else
    <p><b>{{ $comment->user->name }}</b></p>
@endif
<p>{{ $comment->content }}</p>
<p>{{ $comment->created_at }}</p>
<!-- <a href="#" style="display:inline-block;float:right">回复</a> -->
<hr>
