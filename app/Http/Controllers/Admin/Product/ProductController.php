<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\AiProduct;
use App\Models\Product\Product;
use App\Models\Product\ProductLabel;
use App\Models\Product\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $types = ProductType::get();
        // with 是在呼叫 Model Product.php 裡多個 function
        $list = Product::with(['types', 'labels', 'photos'])->orderByDesc('id')->paginate(10);
        return view('admin.product.product.list', compact('types', 'list'));
    }

    public function create()
    {
        $types = ProductType::get();
        $labels = ProductLabel::get();
        return view('admin.product.product.create', compact('types', 'labels'));
    }

    public function doAI(Request $req)
    {
        if (empty($req->productName) && empty($req->title) && empty($req->content))
            {
                return response()-> json(['error' => '請輸入產品名稱、標題或內容，AI 才知道要提供什麼文案']);
            }
        
            $result = AiProduct::suggest($req->productName, $req->title, $req->content);
            return response()->json($result);
    }
}
