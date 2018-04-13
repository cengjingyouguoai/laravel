<?php

namespace App\Http\Controllers\Admin\Type;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * 分类编辑
     */
    public function typeEdit()
    {
        return view('admin.type.type_edit');
    }

}
