<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone\MileStoneType;
use Illuminate\Http\Request;

class MileStoneTypeController extends Controller
{
   //大事記類別列表
   public function list()
   {
      $list = MileStoneType::get();
      return view("admin.milestone.types.list");
   }

   //  新建大事記類別
   public function create() {}
}
