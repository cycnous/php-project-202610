<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductTypeController extends Controller
{
    public function list()
    {
        $list = ProductType::get();
        return view('admin.product.types.list', compact('list'));
    }

    public function create()
    {
        return view('admin.product.types.create');
    }

    public function store(Request $req)
    {
        $types = new ProductType();
        $types->title = $req->title;
        $types->save();

        Session::flash('message', '已新增');
        return redirect('/admin/product/types/list');
    }

    public function edit(Request $req)
    {
        $types = ProductType::find($req->id);
        return view('admin.product.types.edit', compact('types'));
    }

    public function update(Request $req)
    {
        $types = ProductType::find($req->id);
        $types->title = $req->title;
        $types->update();

        Session::flash('message', '已修改');
        return redirect('/admin/product/types/list');
    }

    public function delete(Request $req)
    {
        ProductType::destroy($req->id);
        Session::flash('message', '已刪除');
        return redirect('/admin/product/types/list');
    }
}
