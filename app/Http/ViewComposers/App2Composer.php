<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Models\Article;

class App2Composer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //获取动态流-热门文章
        $articles_hot = Article::hot();

        $view->with('articles_hot', $articles_hot);
    }
}
