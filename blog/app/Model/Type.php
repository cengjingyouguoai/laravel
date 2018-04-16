<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Type extends Model
{
    public $timestamps = false;
    protected $table = 'type';

    /**
     * 增加数据
     */
    public function addData($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /**
     * 后台查询
     */
    public function getData()
    {
        $result = Type::orderBy('type_sort','desc')->get();
        if ($result) {
            return $result->toArray();
        } else {
            return $result;
        }
    }
    /**
     * 修改是否显示
     */
    public function updateStatus($id,$data)
    {
        DB::table($this->table)->where(['type_id' => $id])->update($data);
    }
}
