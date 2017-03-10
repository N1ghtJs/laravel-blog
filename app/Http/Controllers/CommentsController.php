<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $comment = Comment::create([
            'article_id' => $request->article_id,
            'user_id' => $request->user_id,
            'content' => $request->content,
        ]);

        session()->flash('success', '评论成功');
        return back();
    }
}
