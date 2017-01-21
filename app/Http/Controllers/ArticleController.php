<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

use Markdown;//Markdown 解析器

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::findOrFail($id);

        //markdown 解析
        $article->content = Markdown::convertToHtml($article->content);

        //更新浏览量
        Article::update_view($id);

        //获取动态流-热门文章
        $articles_hot = Article::hot();

        return view('article.show', compact('article', 'articles_hot'));
    }

    public function list()
    {
        //获取全部文章
        $articles = Article::orderBy('created_at','desc')->paginate(20);

        //获取动态流-热门文章
        $articles_hot = Article::hot();

        return view('article.list', compact('articles', 'articles_hot'));
    }

    public function search(Request $request)
    {
        //搜索文章
        $articles = Article::search($request->key);

        //获取动态流-热门文章
        $articles_hot = Article::hot();

        session()->flash('success', '搜索完成');
        return view('article.list',compact('articles', 'articles_hot'));
    }
}
