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
     * 修改
     */
    public function updateStatus($id,$data)
    {
       return DB::table($this->table)->where(['type_id' => $id])->update($data);
    }
    /**
     * 查询排序是否存在
     */
    public function getOneData($sort)
    {
          $result =Type::where(['is_show' => 1,'is_delete' => 0,'type_sort' => $sort])->first();
          if ($result) {
              return $result->toArray();
          } else {
              return $result;
          }
    }

    /**
     * 查询分类
     */
    public function getTypeList()
    {
        $result = Type::where(['is_show' => 1,'is_delete' => 0])->get();
        if ($result) {
            return $result->toArray();
        } else {
            return $result;
        }
    }
}
