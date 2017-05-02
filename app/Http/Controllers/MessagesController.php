<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Message;

use Auth;

use App\Mail\NewMessage;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function index()
    {
        //获取全部留言
        $messages = Message::orderBy('created_at','desc')->paginate(20);

        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:120',
        ]);

        //获取 user_id 未登录用户为 0
        if (Auth::check()) {
            $user_id = Auth::id();
        }else{
            $user_id = 0;
        }

        $message = Message::create([
            'user_id' => $user_id,
            'content' => $request->content,
        ]);

        //发送邮件通知
        Mail::to(User::findOrFail(1))->send(new NewMessage());

        session()->flash('success', '留言成功');
        return redirect()->route('messages.index');
    }
}
