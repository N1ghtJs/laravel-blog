{{--轮播--}}
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom: 20px;">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="{{ route('article.show', 3) }}"><img src="/img/slide/1.jpg" alt="imax1"></a>
        </div>
        <div class="item">
            <a href="#"><img src="/img/slide/2.jpg" alt="imax2"></a>
        </div>
    </div>

    <!-- Controls -->
    <div class="z-imax">
        <a class="left" href="#carousel-example-generic" data-slide="prev">
            <span class="button glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right" href="#carousel-example-generic" data-slide="next">
            <span class="button glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
