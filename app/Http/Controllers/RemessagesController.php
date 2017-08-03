<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Remessage;
use App\Models\Message;

use Auth;

class RemessagesController extends Controller
{
    //存储回复
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $remessage = Remessage::create([
            'user_id' => Auth::id(),
            'message_id' => $request->message_id,
            'content' => $request->content,
        ]);

        //session()->flash('success', '回复成功');
        //return back();
    }
}
