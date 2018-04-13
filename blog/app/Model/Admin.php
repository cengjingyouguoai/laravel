<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;
    protected $table = 'admin';
    public function checkLogin($username,$password)
    {

        $result = Admin::where(['admin_name' => $username , 'admin_password' => $password])->first();
        if ($result) {
            return $result->toArray();
        } else {
            return false;
        }
    }
}
