<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Recomment extends Model
{
    public $timestamps = false;
    protected $table = 'recomment';

    /**
     * 增加回复
     */
    public function addRecomment($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /**
     * 获取文章回复
     */
    public function getRecomment($recommentId)
    {
        $result = Recomment::where(['comment_id' => $recommentId])->orderBy('create_at','desc')->limit(10)->get();
        if ($result) {
            return $result->toArray();
        } else {
            return [];
        }
    }
}
