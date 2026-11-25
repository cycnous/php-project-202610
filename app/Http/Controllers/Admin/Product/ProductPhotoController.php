<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductPhoto;
use Illuminate\Http\Request;

class ProductPhotoController extends Controller
{
    public function list(Request $req)
    {
        $productId = $req->productId;
        $product = Product::find($productId);
        $list = (new ProductPhoto())->getList($productId);
        return view('admin.product.photo.list', compact('productId', 'product', 'list'));
    }
}
