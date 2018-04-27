<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    public $timestamps = false;
    protected $table = 'comment';

    /**
     * 增加留言
     */
    public function addComments($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /**
     * 查询留言
     */
    public function getCommentByArticleId($articleId)
    {
       /* $result =  Comment::leftjoin('recomment','comment.recomment_id','=','recomment.id')
            ->select('comment.id','comment.article_id','comment.comment_content','recomment.create_at','recomment.id','recomment.recomment_content','recomment.create_at as creates_at')
            ->orderBy('recomment.create_at','desc')
            ->get();
        if ($result) {
            return $result->toArray();
        } else {
            return $result;
        }*/
        $result = Comment::where(['article_id' => $articleId])->orderBy('create_at','desc')->limit(10)->get();
        if ($result) {
            return $result->toArray();
        } else {
            return $result;
        }
    }
}
