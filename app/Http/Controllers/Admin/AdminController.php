<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->id == 1) {
            return view('admin.index');
        }
        else {
            session()->flash('warning', '没有权限');
            return view('home');
        }
    }
}
