<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function list()
    {
        // get: 取得全部資料, 也可以用all -> Manager::all();
        // 將取得的資料以$list變數儲存
        $list = Manager::get();
        // compact: 將資料渲染到admin.manager.list這個網頁
        // compact('list'): 這個list為上一行的$list, 兩者名稱要一致
        return view('admin.manager.list', compact('list'));
    }
}
