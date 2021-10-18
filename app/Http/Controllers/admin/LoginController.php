<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //登录页展示
    public function index() {
        if (auth()->check())
        {
            return redirect(route('admin.index'));
        }
        return view('admin.login.login');

    }
    //登录实现
    public function login(Request $request) {
       $post = $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => '密码都不填你想飞吗',
           'password.required' => '密码不能为空'
       ]);

       if (auth()->attempt($post)) {
           return redirect()->route('admin.index');
       }
       return redirect()->route('admin.login')->withErrors('账号密码不正确');


//        dd($request->all());

    }

    //后台管理员退出
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login')->with('success','请重新登录');
    }
}
