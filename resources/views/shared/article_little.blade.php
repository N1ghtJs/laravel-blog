<div class="z-article-little">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <a href="{{ route('article.show', $article->id) }}"><h5>{{ $article->title }}</h5></a>
        </div>
        <div class="col-md-4 col-sm-4">
            <span class="glyphicon glyphicon-eye-open"></span><span style="margin-right:10px"> {{ $article->view }}</span>
            <span class="glyphicon glyphicon-edit"></span><span style="margin-right:10px"> {{ $article->comment }}</span>
            <span class="glyphicon glyphicon-time"></span><span> {{ $article->created_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
