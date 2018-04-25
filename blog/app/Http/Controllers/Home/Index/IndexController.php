<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Type;
class IndexController extends Controller
{
    /**
     * 首页
     */
    public function index()
    {
        $typeModel = new Type();
        $typeData = $typeModel->getTypeList();//首页分类
        return view('home.index.index',['type_data' => $typeData]);
    }

}
