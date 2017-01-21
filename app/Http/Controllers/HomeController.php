<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取动态流-最新文章
        $articles_new = Article::new();
        //获取动态流-热门文章
        $articles_hot = Article::hot();

        return view('home', compact('articles_new', 'articles_hot'));
    }
}
