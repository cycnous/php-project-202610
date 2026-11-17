<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Milestone\AiMileStone;
use Illuminate\Http\Request;

class AiMileStoneController extends Controller
{
    public function index(Request $req)
    {
        // 傳送過來要查詢的資料
        $keyword = $req->keyword;

        // 預設為空陣列
        $list = [];

        if (!empty($keyword)) {

            // serach: 這個是 static function (靜態的), 所以不用 new AiMileStone, 即可直接呼叫(用::)
            $list = AiMileStone::serach($keyword);
        }

        return view('front.milestone.ai', compact('keyword', 'list'));
    }
}
