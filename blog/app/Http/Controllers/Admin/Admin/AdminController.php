<?php

namespace App\Http\Controllers\Admin\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
class AdminController extends Controller
{
    /**
     * 管理员列表页
     */
    public function adminList()
    {
        $adminModel = new Admin();
        $data = $adminModel->getData();
        return view('admin.admin.admin_list',['data' => $data]);
    }
    /**
     * 管理员修改
     */
    public function adminUpdate(Request $request)
    {
        $id = intval($request->input('id'));
        $adminModel = new Admin();
        $data = $adminModel->getOneData($id);
        return view('admin.admin.admin_update',['data' => $data]);
    }

    /**
     * 管理员修改处理
     */
    public function adminUpdateDeal(Request $request)
    {
        $id = intval($request->input('id'));
        $passowrd = trim($request->input('password'));
        $passowrd = md5($passowrd);
        $adminModel = new Admin();
        $data = [
            'admin_password' => $passowrd,
            'update_time'  => time()
        ];
        $result = $adminModel->updateData($data,$id);
        if ($result) {
            return successJump('admin/admin/admin_list','修改成功');
        } else {
            return errorJump('admin/admin/admin_list','修改失败');
        }
    }
}
