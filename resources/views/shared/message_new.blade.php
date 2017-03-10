<!-- 最新留言 -->
<div class="z-panel">
    <div class="z-panel-header">
        最新留言
    </div>
    <div class="z-panel-body">
        <ul>
            @foreach ($messages_new as $message)
                <li>
                    @if( $message->user_id == 0)
                        <span><b>匿名</b></span>
                    @else
                        <span><b>{{ $message->user->name }}</b></span>
                    @endif
                    <span>：{{ $message->content }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="z-panel-footer">
        <a href="{{ route('messages.index') }}">查看更多留言>></a>
    </div>
</div>
