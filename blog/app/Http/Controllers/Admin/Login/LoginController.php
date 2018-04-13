<?php

namespace App\Http\Controllers\Admin\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
class LoginController extends Controller
{
    /**
     * 登录页面
     */
    public function login()
    {
        return view('admin.login.login');
    }

    /**
     * 退出
     */
    public function loginOut(Request $request)
    {
        $request->session()->forget('username');
        if (!$request->session()->exists('username')) {
            return  successJump('admin/lgoin/login');
        }
    }

    /**
     * 登录判断
     */
    public function loginDeal(Request $request)
    {
        $username = trim($request->input('username'));//用户名
        $password = trim($request->input('password'));//密码
        $adminModel = new Admin;
        $result = $adminModel->checkLogin($username,md5($password));
        if ($result) {
            $request->session()->put('username',$username);
            return  successJump('admin/index/index','登录成功');
        } else {
            return  errorJump('admin/login/login','登录失败');
        }
    }
}
