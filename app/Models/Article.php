<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //数据表名称
    protected $table = 'articles';

    //可写字段
    protected $fillable = [
        'title', 'intro', 'content',
    ];

    //更新浏览量
    static public function update_view($id)
    {
        $article = Article::findOrFail($id);
        $article->view += $article->view;
        $article->update([
            'view' => $article->view,
        ]);
    }

    //搜索文章
    static public function search($key)
    {
        $article = Article::where('title', 'like', '%'.$key.'%')->paginate(10);
        return $article;
    }

    //动态流-最新文章
    static public function new()
    {
        $articles = Article::orderBy('created_at','desc')->take(5)->get();

        return $articles;
    }

    //动态流-热门文章
    static public function hot()
    {
        $articles = Article::orderBy('view','desc')->take(5)->get();

        return $articles;
    }
}
