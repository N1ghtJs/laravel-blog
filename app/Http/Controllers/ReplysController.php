<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reply;

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

        //session()->flash('success', '回复成功');
        //return back();
    }
}
