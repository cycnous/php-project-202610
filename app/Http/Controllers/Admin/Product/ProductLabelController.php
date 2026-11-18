<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductLabelController extends Controller
{
    public function list()
    {
        $list = ProductLabel::get();
        return view('admin.product.label.list', compact('list'));
    }

    public function create()
    {
        return view('admin.product.label.create');
    }

    public function store(Request $req)
    {
        $label = new ProductLabel();
        $label->label = $req->label;
        $label->save();

        Session::flash('message', '已新增');
        return redirect('/admin/product/label/list');
    }

    public function edit(Request $req)
    {
        $label = ProductLabel::find($req->id);
        return view('admin.product.label.edit', compact('label'));
    }

    public function update(Request $req)
    {
        $label = ProductLabel::find($req->id);
        $label->label = $req->label;
        $label->update();

        Session::flash('message', '已修改');
        return redirect('/admin/product/label/list');
    }

    public function delete(Request $req)
    {
        ProductLabel::destroy($req->id);
        Session::flash('message', '已刪除');
        return redirect('/admin/product/label/list');
    }
}
