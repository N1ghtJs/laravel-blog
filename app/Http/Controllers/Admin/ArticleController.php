<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;

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

        //  BUG  封面图片存储并生成路径--> 读取不到？
        //$cover_path = Storage::url($request->cover->store('public/covers'));
        //Image::make($cover_path)->resize(350, 200)->save($cover_path);

        //封面图片压缩存储并生成路径
        $cover_path = "img/article/cover/" . time() . ".jpg";
        Image::make($request->cover)->resize(355, 200)->save(public_path($cover_path));

        $article = Article::create([
            'title' => $request->title,
            'intro' => $request->intro,
            'content' => $request->content,
            'cover' => $cover_path,
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

        //如果上传了封面图片则更新
        if ($request->hasFile('cover')) {
            //封面图片压缩存储并生成路径
            $cover_path = "img/article/cover/" . time() . ".jpg";
            Image::make($request->cover)->resize(355, 200)->save(public_path($cover_path));
            $article->update([
                'cover' => $cover_path,
            ]);
        }

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
