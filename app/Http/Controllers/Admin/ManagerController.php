<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class ManagerController extends Controller
{
    // public function list()
    // {
    //     // get: 取得全部資料, 也可以用all -> Manager::all();
    //     // 將取得的資料以$list變數儲存
    //     // $list = Manager::get();
    //     // 改作分頁, paginate(每幾筆為一頁)
    //     $list = Manager::paginate(1);
    //     // 計算總筆數
    //     $total = Manager::count();
    //     // compact: 將資料渲染到admin.manager.list這個網頁
    //     // compact('list'): 這個list為上一行的$list, 兩者名稱要一致
    //     return view('admin.manager.list', compact('list', 'total'));
    // }

    // public function create()
    // {
    //     return view('admin.manager.create');
    // }

    // 帳號列表
    public function list()
    {
        /*
            Manager::get():取得manager資料表中全部資料, $list為變數名稱
            :: static(靜態), 不用new物件即可直接取得
        */
        $list = Manager::get();
        /*
            $list要與compact("list")中的"list"名稱一致
            compact:將取得的資料渲染(在網頁中呈現)到網頁中(admin.manager.list)
        */
        // return view("admin.manager.list", compact("list"));

        // 套版開始
        // 1.建立新網頁admin/manager/list1.blade.php
        // 2.開啟範例網站admin/admins.html, 複製貼上到list1.blade.php
        // 3.將list1.blade.php的css及js的路徑改成根目錄(/)
        // 4.將原本retuen view改成新網頁list1

        return view("admin.manager.list1", compact("list"));
    }

    // 新增管理帳號
    public function create()
    {
        // return view("admin.manager.create");
        // 1.新增/admin/manager/create1.blade.php
        // 2.開啟範例網站/admin/admins-forms.html, 複製貼上到create1.blade.php
        // 3.將create1.blade.php的css及js的路徑改成根目錄(/)
        // 4.將原本retuen view改成新網頁create1
        return view("admin.manager.create1");
    }

    // 儲存新增的帳號
    public function store(Request $req)
    {
        // 要new Manager產生新物件
        $manager = new Manager();
        // $manger為manager資料表
        // $manager->userId為manager資料表中userId欄位
        // $req->userId為新增帳號網頁中所輸入的帳號
        $manager->userId = $req->userId;
        // $manager->pwd為pwd欄位, $req->pwd為所輸入的密碼
        $manager->pwd = $req->pwd;
        // save():儲存 $manager->save()將所輸入的資料存入manager資料表中
        $manager->save();

        // 通常新增完成要告知使用者已新增完成,這裡為了簡化流程暫時不處理
        return redirect("/manager/list");
    }

    // 修改管理帳號
    public function edit(Request $req)
    {
        // 找到要修改的那一筆帳號資料
        $manager = Manager::find($req->id);
        // 將帳號資料帶入edit.blade.php網頁中
        return view("admin.manager.edit", compact("manager"));
    }

    // 更新管理帳號
    public function update(Request $req)
    {
        // $req->id中的id為路由/manager/edit/{id}中的id, 二個名稱要一樣
        // find:尋找  Manager::find($req-id)在manager資料表中尋找所帶進來的id這筆資料
        $manager = Manager::find($req->id);
        $manager->userId = $req->userId;
        $manager->pwd = $req->pwd;
        // update:更新, 也可以用$manager->save()
        // 通常要判斷所更新的帳號是否已存在資料表中, 這裡先省略
        $manager->update();
        // 轉址回到帳號列表, 提示已修改完成的動作已省略
        return redirect("/manager/list");
    }

    // 刪除帳號
    public function delete(Request $req)
    {
        Manager::destroy($req->id);
        return redirect("/manager/list");
    }

    // 檢查帳號
    public function checkAccount(Request $req)
    {
        $manager = (new Manager())->checkAccount($req->userId);

        // !: 不是(非), !empty(): 不是空的, 表示有資料
        if (!empty($manager))
        {
            // echo: 輸出, php的用法
            // .net 用Response.write; java 用system.out.print; jsp用out.print
            echo('exist');
        }
    }
}
