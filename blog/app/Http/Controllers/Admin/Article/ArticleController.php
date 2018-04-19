<?php

namespace App\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Type;
class ArticleController extends Controller
{
    /**
     * 列表页面
     */
    public function articleList()
    {
        echo 123;
    }
    /**
     * 增加文章
     */
    public function addArticle(Request $request)
    {
        $typeModel = new Type();
        $data = $typeModel->getTypeList();
        return view('admin/article/add_article',['data' => $data]);
    }
}
