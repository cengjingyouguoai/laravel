<?php

namespace App\Http\Controllers\Admin\Card;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Card;
class CardController extends Controller
{

    /**
     * 展示页面
     */
    public function cardList()
    {
        $cardModel = new Card();
        $data =  $cardModel->getData();
        return view('admin.card.card_list',['data' => $data]);
    }

    /**
     * 增加页面
     */
    public function cardEdit()
    {
        return view('admin.card.card_edit');
    }

    /**
     * 增加处理
     */
    public function cardEditDeal(Request $request)
    {
        $id = intval($request->input('id'));
        $name = trim($request->input('name'));//网名
        $job = trim($request->input('job'));//职业
        $mobile = trim($request->input('mobile'));//电话
        $email = trim($request->input('email'));
        $cardModel = new Card();
        if (empty($id)) {
            if (mb_strlen($name) <= 0 || mb_strlen($name) > 50) {
                return errorJump('admin/card/card_edit','网名字数在1到50之间');
            }
            if (mb_strlen($job) <= 0 || mb_strlen($job) > 50) {
                return errorJump('admin/card/card_edit','职业字数在1到50之间');
            }
            if (mb_strlen($mobile) <= 0 || mb_strlen($mobile) > 12) {
                return errorJump('admin/card/card_edit','请正确输入手机号');
            }
            $data = [
                'blog_name' => $name,
                'blog_job' => $job,
                'blog_mobile' => $mobile,
                'blog_email'  => $email,
                'create_at'   => time(),
                'update_at'   => time()
            ];
            $result = $cardModel->addData($data);
            if ($result) {
                return successJump('admin/card/card_list','成功');
            } else {
                return errorJump('admin/card/card_edit','失败');
            }
        } else {
            $data = [
                'blog_name' => $name,
                'blog_job' => $job,
                'blog_mobile' => $mobile,
                'blog_email'  => $email,
                'update_at'   => time()
            ];
            $result = $cardModel->updateData($id,$data);
            if ($result) {
                $datas = [
                    'code' => '200',
                    'msg'  => '修改成功'
                ];
                return json_encode($datas);
            } else {
                $datas = [
                    'code' => '500',
                    'msg'  => '修改失败'
                ];
                return json_encode($datas);
            }
        }

    }
}
