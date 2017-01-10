<div class="z-article-little">
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('article.show', $article->id) }}"><h5>{{ $article->title }}</h5></a>
        </div>
        <div class="col-md-4 hidden-sm hidden-xs">
            <span>浏览：{{ $article->view }}</span>
            <span>评论：{{ $article->comment }}</span>
            <span>时间: {{ $article->created_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
