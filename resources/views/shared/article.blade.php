<div class="z-article">
    <div class="row">
        <div class="col-md-4 picture">
            <a href="{{ route('article.show', $article->id) }}"><img src="{{ $article->cover }}"></a>
        </div>
        <div class="col-md-8 content">
            <a href="{{ route('article.show', $article->id) }}"><h5>{{ $article->title }}</h5></a>
            <span class="glyphicon glyphicon-eye-open"></span><span style="margin-right:10px"> {{ $article->view }}</span>
            <span class="glyphicon glyphicon-edit"></span><span style="margin-right:10px"> {{ $article->comment }}</span>
            <span class="glyphicon glyphicon-time"></span><span> {{ $article->created_at }}</span>
            <p>{{ $article->intro}}</p>
        </div>
    </div>
</div>
