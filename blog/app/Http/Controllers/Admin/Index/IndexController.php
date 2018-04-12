<?php

namespace App\Http\Controllers\Admin\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 后台首页
     */
    public function index()
    {
        return view('admin.index.index');
    }

    /**
     * 后台首页2
     */
    public function indexTwo()
    {
        return view('admin.index.index_two');
    }
}
