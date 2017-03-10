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

        //获取评论
        $comments = $article->comments()->orderBy('created_at','desc')->paginate(10);


        return view('article.show', compact(['article','comments']));
    }

    public function list()
    {
        //获取全部文章
        $articles = Article::orderBy('created_at','desc')->paginate(20);

        return view('article.list', compact('articles'));
    }

    public function search(Request $request)
    {
        //搜索文章
        $articles = Article::search($request->key);

        session()->flash('success', '搜索完成');
        return view('article.list',compact('articles'));
    }
}
