<?php

namespace App\Http\Controllers\Home\Article;

use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Type;
use App\Model\Yea;
use App\Model\Recomment;
class ArticleController extends Controller
{
    /**
     * 文章详情
     */
   public function articleList(Request $request)
   {
       $articleId = intval($request->input('article_id'));
       $articleModel = new Article();
       $articleModel->addClick($articleId);//增加点击率
       $articleData = $articleModel->getOneArticleList($articleId);
       $typeModel = new Type();
       $typeData = $typeModel->getTypeList();//首页分类
       $hotData = $articleModel->getHotArticle();//热门点击
       $newData = $articleModel->newArticle();//栏目更新
       $commentModel = new Comment();
       $commentData = $commentModel->getCommentByArticleId($articleId);
       $recommentModel = new Recomment();
       foreach ($commentData as $key => $val) {
           $commentData[$key]['recomment'] = $recommentModel->getRecomment($val['id']);
       }
       return view('home.view.view',['article_data' => $articleData,'type_data' => $typeData,'hot_data' => $hotData,'new_data' => $newData,'comment_data' => $commentData]);
   }

   /**
    * 点赞
    */
   public function articleAddYea(Request $request)
   {
       $articleId = intval($request->input('article_id'));
       $ip = $request->getClientIp();
       $yeaModel = new Yea();
       $result = $yeaModel->getData($articleId,$ip);
       if ($result) {
           $data = [
             'code' => 500,
             'message'  => '您已经点赞过啦!'
           ];
           return json_encode($data);
       } else {
            $datas = [
              'article_id' => $articleId,
              'yea_ip'     => $ip,
              'create_at'  => time()
            ];
            $res = $yeaModel->addData($datas);
            if ($res) {
                $articleModel = new Article();
                $results = $articleModel->addYea($articleId);
                if ($results) {
                    $data = [
                        'code' => 200,
                        'message'  => '谢谢您点赞!'
                    ];
                    return json_encode($data);
                } else {
                    $data = [
                        'code' => 500,
                        'message'  => '您已经点赞过啦!'
                    ];
                    return json_encode($data);
                }
            }
       }
   }
}
