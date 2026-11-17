<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function list()
    {
        $list = ProductType::get();
        return view('admin.product.types.list', compact('list'));
    }
}
