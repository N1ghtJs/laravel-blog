<div class="z-article">
    <div class="row">
        <div class="col-md-4 picture">
            <a href="{{ route('article.show', $article->id) }}"><img src="img/article/2.jpg"></a>
        </div>
        <div class="col-md-8 content">
            <a href="{{ route('article.show', $article->id) }}"><h5>{{ $article->title }}</h5></a>
            <span>浏览：{{ $article->view }}</span>
            <span>评论：{{ $article->comment }}</span>
            <span>时间: {{ $article->created_at }}</span>
            <p>{{ $article->intro}}</p>
        </div>
    </div>
</div>
