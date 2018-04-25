<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Title extends Model
{
    public $timestamps = false;
    protected $table = 'title';

    /**
     * 增加
     */
    public function addData($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /**
     * 后台查询数据
     */
    public function getData()
    {
        $result = Title::orderBy('sort','desc')->get();
        if ($result) {
            return $result->toArray();
        } else {
            return $result;
        }
    }

    /**
     * 修改
     */
    public function updateStatus($id,$data)
    {
        return DB::table($this->table)->where(['id' => $id])->update($data);
    }
}
