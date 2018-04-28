<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Card extends Model
{
    public $timestamps = false;
    protected $table = 'card';

    /**
     * 增加
     */
    public function addData($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /**
     * 展示
     */
    public function getData()
    {
        $result = Card::first();
        if ($result) {
            return $result->toArray();
        } else {
            return $result;
        }
    }

    /**
     * 修改
     */
    public function updateData($id,$data)
    {
        return DB::table($this->table)->where(['id' => $id])->update($data);
    }
}
