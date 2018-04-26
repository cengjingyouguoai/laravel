<?php

namespace App\Http\Controllers\Home\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Type;
class ArticleController extends Controller
{
    /**
     * 文章详情
     */
   public function articleList(Request $request)
   {
       $articleId = intval($request->input('article_id'));
       $articleModel = new Article();
       $articleData = $articleModel->getOneArticleList($articleId);
       $typeModel = new Type();
       $typeData = $typeModel->getTypeList();//首页分类
       return view('home.view.view',['article_data' => $articleData,'type_data' => $typeData,]);
   }
}
