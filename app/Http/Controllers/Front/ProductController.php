<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(Request $req)
    {
        $sql = Product::with(['types', 'labels', 'photos']);

        if (!empty($req->typeId)) 
        {
            $sql->where("typeId", $req->typeId);
        }

        if (!empty($req->keyword))
        {
            $sql->where(function ($q) use ($req) {
                $q->where('productNo', 'like', '%'. $req->keyword . '%')
                  ->orwhere('productName', 'like', '%'. $req->keyword . '%')
                  ->orwhere('title', 'like', '%'. $req->keyword . '%');
            });
        }

        // withQueryString: 如果有搜尋, 保留原本的搜尋資料
        $list = $sql->paginate(12)->withQueryString();
        $types = ProductType::get();
        return view('front.product.list', compact('list', 'types'));
    }
}
