<?php

namespace App\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Type;
use Intervention\Image\ImageManagerStatic as Image;
use App\Model\Article;
class ArticleController extends Controller
{
    /**
     * 列表页面
     */
    public function articleList()
    {
        $articleModel = new Article();
        $data = $articleModel->getData();
        $typeModel = new Type();
        $typeData = $typeModel->getTypeList();
        return view('admin/article/article_list',['data' => $data,'type_data' => $typeData]);
    }
    /**
     * 增加文章
     */
    public function addArticle(Request $request)
    {
        $id = $request->input('id');
        $articleModel = new Article();
        if ($id != '') {
            $datas = $articleModel->getOneData($id);
            $article_id = $id;
        } else {
            $datas = [];
            $article_id = 0;
        }
        $typeModel = new Type();
        $data = $typeModel->getTypeList();
        return view('admin/article/add_article',['data' => $data,'datas' => $datas,'article_id' => $article_id]);
    }
    /**
     * 处理增加文章
     */
    public function addArticleDeal(Request $request)
    {
        $articleId = intval($request->input('article_id'));
        if (empty($articleId)) {
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $title = trim($request->input('title'));//标题
                $type = intval($request->input('type'));//类型
                $sort = intval($request->input('sort'));//排序
                $article = trim($request->input('article'));//文章内容
                $small_content = trim($request->input('small_content'));//文章简介
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension();
                $extensions = ['jpg','png','gif','jpeg'];
                if (!in_array($extension,$extensions)) {
                    return errorJump('admin/article/add_article','图片格式不正确');
                }
                $file_name = uniqid().'.'.$photo->getClientOriginalExtension();
                $file_path =public_path('article/images');
                $file = '/thumbnail-';
                $thumbnail_file_path = $file_path . $file.$file_name;
                $image = Image::make($photo)->resize(200, 200, function ($constraint) {$constraint->aspectRatio();})->save($thumbnail_file_path);
                $data = [
                    'article_title' => $title,
                    'article_type'  => $type,
                    'article_sort'  => $sort,
                    'article_content' => $article,
                    'article_img'     => 'article/images'.$file.$file_name,
                    'small_content'   => $small_content,
                    'create_at'      => time(),
                    'update_at'      => time(),
                ];
                $articleModel = new Article();
                $result = $articleModel->addData($data);
                if ($result) {
                    return successJump('admin/article/article_list','添加成功');
                } else {
                    return errorJump('admin/article/add_article','添加失败');
                }
            } else {
                return errorJump('admin/article/add_article','图片上传失败');
            }
        } else {
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $title = trim($request->input('title'));//标题
                $type = intval($request->input('type'));//类型
                $sort = intval($request->input('sort'));//排序
                $article = trim($request->input('article'));//文章内容
                $small_content = trim($request->input('small_content'));//文章简介
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension();
                $extensions = ['jpg','png','gif','jpeg'];
                if (!in_array($extension,$extensions)) {
                    return errorJump('admin/article/add_article','图片格式不正确');
                }
                $file_name = uniqid().'.'.$photo->getClientOriginalExtension();
                $file_path =public_path('article/images');
                $file = '/thumbnail-';
                $thumbnail_file_path = $file_path . $file.$file_name;
                $image = Image::make($photo)->resize(200, 200, function ($constraint) {$constraint->aspectRatio();})->save($thumbnail_file_path);
                $data = [
                    'article_title' => $title,
                    'article_type'  => $type,
                    'article_sort'  => $sort,
                    'article_content' => $article,
                    'article_img'     => 'article/images'.$file.$file_name,
                    'small_content'   => $small_content,
                    'update_at'      => time(),
                ];
                $articleModel = new Article();
                $result = $articleModel->updateStatus($data,$articleId);
                if ($result) {
                    return successJump('admin/article/article_list','修改成功');
                } else {
                    return errorJump('admin/article/add_article','修改失败');
                }
            } else {
                $title = trim($request->input('title'));//标题
                $type = intval($request->input('type'));//类型
                $sort = intval($request->input('sort'));//排序
                $article = trim($request->input('article'));//文章内容
                $small_content = trim($request->input('small_content'));//文章简介
                $photo = trim($request->input('photos'));
                $extension = pathinfo($photo)['extension'];
                $extensions = ['jpg','png','gif','jpeg'];
                if (!in_array($extension,$extensions)) {
                    return errorJump('admin/article/article_list','图片格式不正确');
                }
                $file_name = uniqid().'.'.$extension;
                $file_path =public_path('article/images');
                $file = '/thumbnail-';
                $thumbnail_file_path = $file_path . $file.$file_name;
                $image = Image::make($photo)->resize(200, 200, function ($constraint) {$constraint->aspectRatio();})->save($thumbnail_file_path);
                $data = [
                    'article_title' => $title,
                    'article_type'  => $type,
                    'article_sort'  => $sort,
                    'article_content' => $article,
                    'article_img'     => 'article/images'.$file.$file_name,
                    'small_content'   => $small_content,
                    'update_at'      => time(),
                ];
                $articleModel = new Article();
                $result = $articleModel->updateStatus($data,$articleId);
                if ($result) {
                    return successJump('admin/article/article_list','修改成功');
                } else {
                    return errorJump('admin/article/add_article','修改失败');
                }
            }
        }

    }

    /**
     * 点击查看文章详情
     */
    public function articleDetails(Request $request)
    {
         $articleId = intval($request->input('article_id'));
         $articleModel = new Article();
         $data= $articleModel->getArticleDetails($articleId);
         return view('admin/article/article_details',['data' => $data]);
    }

    /**
     * 发表文章
     */
    public function articlePublish(Request $request)
    {
        $articleId = intval($request->input('id'));
        $status = intval($request->input('status'));
        if ($status == 1) {
            $data = [
                'is_publish' => 0,
                'update_at' => time()
            ];
            $articleModel = new Article();
            $result = $articleModel->updateStatus($data,$articleId);
        } else {
            $data = [
                'is_publish' => 1,
                'update_at' => time()
            ];
            $articleModel = new Article();
            $result = $articleModel->updateStatus($data,$articleId);
        }
        if ($result) {
            return successJump('admin/article/article_list','成功');
        } else {
            return errorJump('admin/article/article_list','失败');
        }
    }
    /**
     * 删除文章
     */
    public function articleDelete(Request $request)
    {
        $articleId = intval($request->input('id'));
        $articleModel = new Article();
        $data = [
            'is_delete' => 1,
            'update_at' => time()
        ];
        $result = $articleModel->updateStatus($data,$articleId);
        if ($result) {
            return successJump('admin/article/article_list','成功');
        } else {
            return errorJump('admin/article/article_list','失败');
        }
    }
    /**
     * 恢复文章
     */
    public function articleRegain(Request $request)
    {
        $articleId = intval($request->input('id'));
        $articleModel = new Article();
        $data = [
            'is_delete' => 0,
            'update_at' => time()
        ];
        $result = $articleModel->updateStatus($data,$articleId);
        if ($result) {
            return successJump('admin/article/article_list','成功');
        } else {
            return errorJump('admin/article/article_list','失败');
        }
    }
}
