<div class="z-article">
    <div class="row">
        <div class="col-md-4 picture">
            <img src="img/article/2.jpg">
        </div>
        <div class="col-md-8 content">
            <h5>{{ $article->title }}</h5>
            <span>浏览：{{ $article->view }}</span>
            <span>评论：{{ $article->comment }}</span>
            <span>时间: {{ $article->created_at }}</span>
            <p>{{ $article->intro}}</p>
        </div>
    </div>
</div>
