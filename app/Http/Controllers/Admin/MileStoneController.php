<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone\MileStone;
use App\Models\Milestone\MileStoneType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
      $types = MileStoneType::get();
      return view('admin.milestone.add', compact('types'));
   }

   public function store(Request $req)
   {
      // 因為內容是文字框, 可能會有換行, 所以要另外做處理
      $content = $req->content;
      if (!empty($content)) {
         // str_replace: 取代
         // str_replace( 要被取代的內容, 新的內容, 存在哪個變數 )
         // \n: 輸入框的換行(Enter), new line
         // <br/>: 網頁的換行
         $content = str_replace('\n', '<br/>', $content);
      }
      $ms = new MileStone();
      $ms->typeId = $req->typeId;
      $ms->years = $req->year;
      $ms->months = $req->month;
      $ms->title = $req->title;
      $ms->content = $content;
      $ms->point = $req->point;
      $ms->save();

      Session::flash('message', '已新增');
      return redirect('/admin/milestone/list');
   }

   public function edit(Request $req)
   {
      $ms = MileStone::find($req->id);
      $types = MileStoneType::get();
      return view('admin.milestone.edit', compact('ms', 'types'));
   }

   public function update(Request $req)
   {
      // 因為內容是文字框, 可能會有換行, 所以要另外做處理
      $content = $req->content;
      if (!empty($content)) {
         $content = str_replace('\n', '<br/>', $content);
      }
      $ms = MileStone::find($req->id);
      $ms->typeId = $req->typeId;
      $ms->years = $req->year;
      $ms->months = $req->month;
      $ms->title = $req->title;
      $ms->content = $content;
      $ms->point = $req->point;
      $ms->save();

      Session::flash('message', '已更新');
      return redirect('/admin/milestone/list');
   }

   public function delete(Request $req)
   {
      MileStone::destroy($req->id);
      Session::flash('message', '已刪除');
      // return redirect('/admin/milestone/list');
      // 使用路由下的 name (取別名)
      return redirect()->route('mile');
   }
}
