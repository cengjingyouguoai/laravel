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
        $adminId = $request->session()->get('admin_id');
        $adminModel = new Admin;
        $data = [
          'leave_time' => time(),
        ];
        $adminModel->updateData($data,$adminId);
        $request->session()->forget('username');
        if (!$request->session()->exists('admin_id')) {
            return  successJump('admin/login/login','已经退出');
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
            $ip = $request->getClientIp();
            $data = [
                'login_ip' => $ip,
                'login_time' => time(),
            ];
            $adminModel->updateData($data,$result['admin_id']);
            $request->session()->put('username',$username);
            $request->session()->put('admin_id',$result['admin_id']);
            return  successJump('admin/index/index','登录成功');
        } else {
            return  errorJump('admin/login/login','登录失败');
        }
    }
}
