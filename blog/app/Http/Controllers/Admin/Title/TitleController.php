<?php

namespace App\Http\Controllers\Admin\Title;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Title;
class TitleController extends Controller
{
    /**
     * 座右铭列表页
     */
    public function titleList()
    {
        $titleModel = new Title();
        $data = $titleModel->getData();
        return view('admin.title.title_list',['data' => $data]);
    }

    /**
     * 座右铭增加页
     */
    public function titleEdit()
    {
        return view('admin.title.title_edit');
    }

    /**
     * 增加处理
     */
    public function titleEditDeal(Request $request)
    {
        $title = trim($request->input('title'));
        $content = trim($request->input('content'));
        $sort = intval($request->input('sort'));
        if (mb_strlen($title) > 20 || mb_strlen($title) <= 0) {
            return errorJump('admin/title/title_edit','字数在1-20之间');
        }
        if (mb_strlen($content) > 200 || mb_strlen($content) <= 0) {
            return errorJump('admin/title/title_edit','字数在1-200之间');
        }
        $titleModel = new Title();
        $data = [
            'title' => $title,
            'content' => $content,
            'sort'   => $sort,
            'create_at' => time(),
            'update_at' => time()
        ];
        $result = $titleModel->addData($data);
        if ($result) {
            return successJump('admin/title/title_list','添加成功');
        } else {
            return errorJump('admin/title/title_edit','添加失败');
        }
    }
    /**
     * 删除
     */
    public function titleEditDelete(Request $request)
    {
        $id = intval($request->input('id'));
        $state = intval($request->input('state'));
        if ($state == 1) {
            $data = [
                'is_delete' => 0,
            ];
        } else {
            $data = [
                'is_delete' => 1,
            ];
        }
        $titleModel = new Title();
        $result = $titleModel->updateStatus($id,$data);
        if ($result) {
            return successJump('admin/title/title_list','成功');
        } else {
            return errorJump('admin/title/title_edit','失败');
        }
    }

    /**
     * 修改
     */
    public function titleEditUpdate(Request $request)
    {
        $id = intval($request->input('id'));
        $title = trim($request->input('title'));
        $content = trim($request->input('content'));
        $sort = intval($request->input('sort'));

        if (mb_strlen($title) > 20 || mb_strlen($title) <= 0) {
            $data = [
              'code' => 500,
              'msg'  => '失败'
            ];
            return json_encode($data);
        }
        if (mb_strlen($content) > 200 || mb_strlen($content) <= 0) {
            $data = [
                'code' => 500,
                'msg'  => '失败'
            ];
            return json_encode($data);
        }
        $titleModel = new Title();
        $datas = [
            'title' => $title,
            'content' => $content,
            'sort'    => $sort,
            'update_at' => time()
        ];
        $result = $titleModel->updateStatus($id,$datas);
        if ($result) {
            $data = [
                'code' => 200,
                'msg'  => '成功'
            ];
            return json_encode($data);
        } else {
            $data = [
                'code' => 500,
                'msg'  => '失败'
            ];
            return json_encode($data);
        }
    }
}
