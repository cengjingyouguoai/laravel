<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Yea extends Model
{
    public $timestamps = false;
    protected $table = 'yea';


    /**
     * 查询是否同一个IP已经点赞过
     */
    public function getData($articleId,$ip)
    {
        $result = Yea::where(['article_id' => $articleId,'yea_ip' => $ip])->first();
        if ($result) {
            return $result->toArray();
        } else {
            return $result;
        }
    }

    /**
     * 增加点赞
     */
    public function addData($data)
    {
        return DB::table($this->table)->insert($data);
    }

}
