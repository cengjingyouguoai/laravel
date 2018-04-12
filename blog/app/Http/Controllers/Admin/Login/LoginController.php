<?php

namespace App\Http\Controllers\Admin\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * 登录页面
     */
    public function login()
    {
        return view('admin.login.login');
    }
}
