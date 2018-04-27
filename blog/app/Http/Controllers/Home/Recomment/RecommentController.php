<?php

namespace App\Http\Controllers\Home\Recomment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Recomment;
class RecommentController extends Controller
{

    /**
     * 接收评论
     */
    public function recommentAdd(Request $request)
    {
        $articleId = intval($request->input('article_id'));
        $comment = trim($request->input('content'));
        $ids = intval($request->input('ids'));
        if (mb_strlen($comment) <= 0 || mb_strlen($comment) > 50) {
            $data = [
                'code' => 500,
                'msg'  => '字数控制在50以内'
            ];
            return json_encode($data);
        }
        $datas = [
            'article_id' => $articleId,
            'recomment_content' => $comment,
            'comment_id'       => $ids,
            'create_at' => time()
        ];
        $recommentModel = new Recomment();
        $result = $recommentModel->addRecomment($datas);
        if ($result) {
            $data = [
                'code' => 200,
                'msg'  => '回复成功'
            ];
            return json_encode($data);
        } else {
            $data = [
                'code' => 501,
                'msg'  => '回复失败'
            ];
            return json_encode($data);
        }
    }
}
