<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GrahamCampbell\Markdown\Facades\Markdown;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::findOrFail($id);

        //markdown 解析
        $article->content = Markdown::convertToHtml($article->content);

        //更新浏览量
        $article->view = $article->view + 1;
        $article->update([
            'view' => $article->view,
        ]);

        return view('article.show', compact('article'));
    }
}
