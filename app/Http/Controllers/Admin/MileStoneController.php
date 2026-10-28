<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MileStoneController extends Controller
{
    //大事記列表
    public function list()
     {
        return view("admin.milestone.list");
     }
}
