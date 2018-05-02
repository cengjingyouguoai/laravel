<?php

namespace App\Http\Controllers\Admin\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Type;
class IndexController extends Controller
{
    /**
     * 后台首页
     */
    public function index()
    {
        $articleModel = new Article();
        $countArticle = $articleModel->countArticle();
        $typeModel = new Type();
        $countType = $typeModel->countType();
        return view('admin.index.index',['count_article' => $countArticle,'count_type' => $countType]);
    }

    /**
     * 后台首页2
     */
    public function indexTwo()
    {
        return view('admin.index.index_two');
    }
}
