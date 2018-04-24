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
        return view('admin/admin/admin_list',['data' => $data]);
    }
}
