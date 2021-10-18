<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台登录显示
    public function Index(Request $request)
    {
        return view('admin.index.index');
    }
    //后台欢迎页
    public function welcome()
    {
        return view('admin.index.welcome');
    }

}
