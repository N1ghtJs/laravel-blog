<?php
// 文章表模型文件

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //数据表名称
    protected $table = 'articles';

    //可写字段
    protected $fillable = [
        'title', 'intro', 'content', 'cover',
    ];

    //更新浏览量
    static public function update_view($id)
    {
        $article = Article::findOrFail($id);
        $article->view = $article->view + 1;
        $article->update([
            'view' => $article->view,
        ]);
    }

    //更新评论量
    static public function update_comment($id)
    {
        $article = Article::findOrFail($id);
        $article->comment = $article->comment + 1;
        $article->update([
            'comment' => $article->comment,
        ]);
    }

    //搜索文章
    static public function search($key)
    {
        $article = Article::where('title', 'like', '%'.$key.'%')->paginate(20);
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

    //模型关联： 获取文章下的所有评论
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
