<?php

namespace App\Http\Controllers\Home\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
class CommentController extends Controller
{
    /**
     * 接收评论
     */
    public function commentAdd(Request $request)
    {
        $articleId = intval($request->input('article_id'));
        $comment = trim($request->input('content'));
        if (mb_strlen($comment) <= 0 || mb_strlen($comment) > 50) {
            $data = [
                'code' => 500,
                'msg'  => '字数控制在50以内'
            ];
            return json_encode($data);
        }
        $datas = [
          'article_id' => $articleId,
          'comment_content' => $comment,
          'create_at' => time()
        ];
        $commentModel = new Comment();
        $result = $commentModel->addComments($datas);
        if ($result) {
            $data = [
                'code' => 200,
                'msg'  => '评论成功'
            ];
            return json_encode($data);
        } else {
            $data = [
                'code' => 501,
                'msg'  => '评论失败'
            ];
            return json_encode($data);
        }
    }

}
