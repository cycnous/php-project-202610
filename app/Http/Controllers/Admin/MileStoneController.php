<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone\MileStone;
use Illuminate\Http\Request;

class MileStoneController extends Controller
{
   //大事記列表
   public function list()
   {
      // paginate(10): 分頁, 每10為一頁
      // 1. 開啟 app/Providers/AppServiceProvides.php
      //    在 boot() 中加上 Paginator::useBootstrap();
      // 2. 在 /admin/milestone/list.blade.php 中,
      //    foreach 迴圈結束後加上 $list->links() 分頁
      //    $list: 是渲染到網頁中的物件陣列變數名稱
      $list = MileStone::paginate(10);
      return view("admin.milestone.list", compact('list'));
   }

   public function add()
   {
      return view('admin.milestone.add');
   }

   public function store()
   {
      
   }
}
