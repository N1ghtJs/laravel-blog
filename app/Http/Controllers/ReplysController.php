<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Article;

use Auth;

use App\Mail\NewComment;
use Illuminate\Support\Facades\Mail;

class ReplysController extends Controller
{
    //存储回复
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $reply = Reply::create([
            'user_id' => Auth::id(),
            'comment_id' => $request->comment_id,
            'content' => $request->content,
        ]);

        //更新评论量
        $article_id = Comment::findOrFail($request->comment_id)->article->id;
        Article::update_comment($article_id);

        //发送邮件通知
        $data['article_id'] = $article_id;
        Mail::to(User::findOrFail(1))->send(new NewComment($data));

        //session()->flash('success', '回复成功');
        //return back();
    }
}
