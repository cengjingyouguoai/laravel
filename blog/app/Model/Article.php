<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Article extends Model
{
    public $timestamps = false;
    protected $table = 'article';

    /**
     * 增加文章
     */
    public function addData($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /**
     * 后台查询文章
     */
    public function getData()
    {
        return DB::table($this->table)
            ->join('type','article.article_type','=','type.type_id')
            ->select('article.*','type.type_name','type.type_id')
            ->where(['type.is_show' => 1,'type.is_delete' => 0])
            ->paginate(15);
    }

    /**
     * 后台查询单条文章
     */
    public function getOneData($id)
    {
        return Article::join('type','article.article_type','=','type.type_id')
            ->select('article.*','type.type_name','type.type_id')
            ->where(['type.is_show' => 1,'type.is_delete' => 0,'article_id' => $id])
            ->first()
            ->toArray();
    }

    /**
     * 根据文章id查询文章内容
     */
    public function getArticleDetails($article_id)
    {
        $result =Article::where(['article_id' => $article_id])->first();
        if ($result) {
            return $result->toArray();
        } else {
            return $result;
        }
    }

    /*
     * 修改状态
     */
    public function updateStatus($data,$id)
    {
        return DB::table($this->table)->where(['article_id' => $id])->update($data);
    }

    /*
     * 通过文章分类查询文章
     */
    public function getArticleByTypeId($typeId)
    {
       return DB::table($this->table)->where(['is_publish' => 1, 'is_delete' => 0,'article_type' => $typeId])->paginate(15);
    }

}
