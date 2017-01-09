<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Article;

class ArticleController extends Controller
{
    //文章列表页
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->paginate(20);
        return view('admin.article.index', compact('articles'));
    }

    //新建文章页
    public function create()
    {
        return view('admin.article.create');
    }

    //文章->保存
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'intro' => 'max:200',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'intro' => $request->intro,
            'content' => $request->content,
        ]);

        session()->flash('success', '添加成功');
        return redirect()->route('article.index');
    }

    //编辑文章页
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.edit', compact('article'));
    }

    //文章->更新
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'intro' => 'max:200',
        ]);

        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->title,
            'intro' => $request->intro,
            'content' => $request->content,
        ]);

        session()->flash('success', '编辑成功');
        return back();
    }

    //文章->删除
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        session()->flash('success', '删除成功');
        return back();
    }
}
