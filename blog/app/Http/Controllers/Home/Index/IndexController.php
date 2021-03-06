<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Type;
use App\Model\Title;
use App\Model\Article;
use App\Model\Card;
class IndexController extends Controller
{
    /**
     * 首页
     */
    public function index()
    {
        $typeModel = new Type();
        $typeData = $typeModel->getTypeList();//首页分类
        $titleModel = new Title();
        $titleData = $titleModel->getOneData();
        $articleModel = new Article();
        $articleData = $articleModel->getArticleList();//首页文章
        $recommendData = $articleModel->recommendArticle();//推荐文章
        $hotData = $articleModel->getHotArticle();//热门点击
        $cardModel = new Card();
        $cardData = $cardModel->getData();//个人名片
        return view('home.index.index',['card_data' => $cardData,'type_data' => $typeData,'title_data' => $titleData,'article_data' => $articleData,'recommend_data' => $recommendData,'hot_data' => $hotData]);
    }

}
