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

    //动态流-最新文章
    static public function new()
    {
        $articles = Article::orderBy('created_at','desc')->take(5)->get();

        return $articles;
    }
}
