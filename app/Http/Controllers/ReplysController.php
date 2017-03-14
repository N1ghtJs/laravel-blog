<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reply;
use App\Models\Comment;
use App\Models\Article;

use Auth;

class ReplysController extends Controller
{
    //存储回复
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        if (Auth::check()) {
            $user_id = Auth::id();
        }else{
            $user_id = 0;
        }

        $reply = Reply::create([
            'user_id' => $user_id,
            'comment_id' => $request->comment_id,
            'content' => $request->content,
        ]);

        //更新评论量
        $article_id = Comment::findOrFail($request->comment_id)->article->id;
        Article::update_comment($article_id);

        //session()->flash('success', '回复成功');
        //return back();
    }
}
