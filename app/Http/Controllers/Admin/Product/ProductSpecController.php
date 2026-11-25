<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductSpec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductSpecController extends Controller
{
    public function list(Request $req)
    {
        $product = Product::find($req->productId);
        $list = ProductSpec::getSpec($req->productId);
        return view('admin.product.spec.list', compact('product', 'list'));
    }

    public function create(Request $req)
    {
        $product = Product::find($req->productId);
        return view('admin.product.spec.create', compact('product'));
    }

    public function store(Request $req)
    {
        $spec = new ProductSpec();
        $spec->productId = $req->productId;
        $spec->title = $req->title;
        $spec->content = $req->content;
        $spec->save();

        Session::flash('message', '產品規格已新增');
        return redirect('/admin/product/spec/list/' . $req->productId);
    }

    public function delete(Request $req)
    {
        $spec = ProductSpec::find($req->id);
        $productId = $spec->productId;
        $spec->delete();

        Session::flash('message', '產品規格已刪除');
        return redirect('/admin/product/spec/list' . $productId);
    }

    public function edit(Request $req)
    {
        $spec = ProductSpec::find($req->id);
        $product = Product::find($spec->productId);
        return view('admin.product.spec.edit', compact('spec','product'));
    }

    public function update(Request $req)
    {
        $spec = ProductSpec::find($req->id);
        $spec->title = $req->title;
        $spec->content = $req->content;
        $spec->update();

        Session::flash('message','已修改');
        return redirect('/admin/product/spec/list/' . $spec->productId);
    }
}
