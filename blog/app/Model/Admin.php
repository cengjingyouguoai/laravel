<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    public $timestamps = false;
    protected $table = 'admin';

    /**
     * 验证登录信息
     * @param $username
     * @param $password
     * @return bool
     */
    public function checkLogin($username,$password)
    {
        $result = Admin::where(['admin_name' => $username , 'admin_password' => $password])->first();
        if ($result) {
            return $result->toArray();
        } else {
            return false;
        }
    }

    /**
     * 修改登录状态
     */
    public function updateData($data,$adminId)
    {
        return DB::table($this->table)->where(['admin_id' => $adminId])->update($data);
    }

    /**
     * 查询单条管理员信息
     */
    public function getOneData($adminId)
    {
        $result =Admin::where(['admin_id' => $adminId])->first();
        if ($result) {
            return $result->toArray();
        } else {
            return $result;
        }
    }

    /**
     * 查询所有管理员
     */
    public function getData()
    {
        $result = Admin::all();
        if ($result) {
            return $result->toArray();
        } else {
            return null;
        }
    }
}
