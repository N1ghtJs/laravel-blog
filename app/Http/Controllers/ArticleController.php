<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

use Markdown;//Markdown 解析器

class ArticleController extends Controller
{
    //文章详情页
    public function show($id)
    {
        $article = Article::findOrFail($id);

        //markdown 解析
        //$article->content = Markdown::convertToHtml($article->content);

        //更新浏览量
        Article::update_view($id);

        //获取评论
        $comments = $article->comments()->orderBy('created_at','desc')->paginate(10);


        return view('article.show', compact(['article','comments']));
    }

    //文章列表页
    public function list()
    {
        //获取全部文章
        $articles = Article::where('hidden', false)->orderBy('created_at','desc')->paginate(20);

        return view('article.list', compact('articles'));
    }

    //文章搜索页
    public function search(Request $request)
    {
        //搜索文章
        $articles = Article::search($request->key);

        $articles = $articles->appends(['key'=>$request->key]);

        session()->flash('success', '搜索完成');
        return view('article.list',compact('articles'));
    }

    //markdown AJAX 解析
    public function markdown(Request $request)
    {
        return Markdown::convertToHtml($request->content);
    }

    //markdown AJAX 获取文章内容
    public function markdown_article($article_id)
    {
        $article = Article::findOrFail($article_id);
        return Markdown::convertToHtml($article->content);
    }
}
