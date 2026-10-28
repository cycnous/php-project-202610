<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone\MileStoneType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MileStoneTypeController extends Controller
{
   // 大事記類別列表
   public function list()
   {
      $list = MileStoneType::get();
      return view("admin.milestone.types.list", compact('list'));
   }

   // 新建大事記類別
   public function create() 
   {
      // 借用admin/manager/create1.blade.php來調整
      // 1. 複製 admin/manager/create1.blade.php 到 admin/milestone/types/create.blade.php
      return view('admin.milestone.types.create');
   }

   // 儲存大事記類別
   public function store(Request $req)
   {
      // 從 create.blade.php 中有送資料過來, 所以要用 Request 物件接收
      // $req 是物件變數名稱, 可自己命名
      // 要先產生 MileStoneType 物件(new), 才能使用物件的屬性及方法
      // 記得要 use App\Models\Milestone\MileStoneType; 可使用擴充插件帶出
      $types = new MileStoneType();
      $types->label = $req->label;
      $types->title = $req->title;
      $types->save();

      // use Illuminate\Support\Facades\Session;
      // flash: 快閃, 也就是只會出現一次; message: 自己命名的名稱
      Session::flash('message', '已新增類別');
      // 轉址 到大事記類別列表
      // 引用 sweetalert2
      // 1. 進入 https://sweetalert2.github.io/
      // 2. 點選左側選單的 Installation
      // 3. 點選連結 jsDelivr CDN 
      // 4. 複製
      //    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.25/dist/sweetalert2.all.min.js"></script>
      //    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.25/dist/sweetalert2.min.css">
      // 5. 貼到 admin/milestone/types/list.blade.php
      // 6. sweetalert2 的語法一定要放在網頁的 <body></body> 中

      return redirect('/admin/milestone/types/list');
   }

   // 修改
   public function edit(Request $req)
   {
      // 修改大事記類別
      // 1. 在 MileStoneTypeController 中新增 function edit(Request $req)
      // 2. 因為要知道修改哪一筆資料, list.blade.php 網頁中有傳送id, 所以要有Request物件
      // 3. 在路由加上 Route::get('/admin/milestone/types/edit/{id}', [MileStoneTyprController::class, 'edit']);
      // 4. {id}中的id, 為變數名稱, 取用時用$req->id, 兩個id的名稱要一致
      // 5. 在admin/milestone/types 中新增 edit.blade.php
      // 6. 將 admin/milestone/types/create.blade.php 的內容, 複製到 edit.blade.php
      // 7. 修改edit.blade.php

      // SQL語法為 SELECT * FROM milestone_type WHERE id = 傳進來的id
      // 找到要修改的那一筆資料, 
      $types = MileStoneType::find($req->id);
      return view('admin.milestone.types.edit', compact('types'));
   }
}
