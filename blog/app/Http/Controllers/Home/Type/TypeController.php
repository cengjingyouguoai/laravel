<?php

namespace App\Http\Controllers\Home\Type;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Type;
class TypeController extends Controller
{
    /**
     * 首页分类以及分类文章
     */
    public function typeList(Request $request)
    {
        $id = intval($request->input('id'));
        $articleModel = new Article();
        $article = $articleModel->getArticleByTypeId($id);
        $typeModel = new Type();
        $typeData = $typeModel->getTypeList();//首页分类
        return view('home.list.list',['data' => $article,'type_data' => $typeData]);
    }
}
