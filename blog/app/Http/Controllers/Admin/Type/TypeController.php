<?php

namespace App\Http\Controllers\Admin\Type;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Type;
class TypeController extends Controller
{

    /**
     * 分类列表
     */
    public function typeList()
    {
        return view('admin.type.type_list');
    }
    /**
     * 分类编辑页面
     */
    public function typeEdit()
    {
        return view('admin.type.type_edit');
    }
    /**
     * 分类编辑处理
     */
    public function typeEditDeal(Request $request)
    {
        $type = trim($request->input('type'));
        $name = trim($request->input('name'));
        if (empty($name)) {
            return errorJump('admin/type/type_edit','字数在0到10之间');
        }
        $sort = intval($request->input('sort'));
        if (mb_strlen($name) < 0 || mb_strlen($name) > 10) {
            return errorJump('admin/type/type_edit','字数在0到10之间');
        }
        if (!is_int($sort)) {
            return errorJump('admin/type/type_edit','请输入数字');
        }
        $data = [
             'type_name' => $name,
             'type_sort' => $sort,
             'create_at' => time(),
             'update_at' => time(),
        ];
        $typeModel = new Type();
        $result = $typeModel->addData($data);
        if ($result) {
            return successJump('admin/type/type_list','编辑成功');
        } else {
            return errorJump('admin/type/type_edit','编辑失败');
        }

    }

}
