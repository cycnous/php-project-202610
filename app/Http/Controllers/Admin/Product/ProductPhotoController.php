<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductPhoto;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductPhotoController extends Controller
{
    public function list(Request $req)
    {
        $productId = $req->productId;
        $product = Product::find($productId);
        $list = (new ProductPhoto())->getList($productId);
        return view('admin.product.photo.list', compact('productId', 'product', 'list'));
    }

    public function store(Request $req)
    {
        foreach ($req->file('photo') as $file) {
            $fileName = ImageService::saveWithThumb($file, ProductPhoto::path, 300);
            $photo = new ProductPhoto();
            $photo->productId = $req->productId;
            $photo->photo = $fileName;
            $photo->save();
        }

        Session::flash('message', '已上傳');
        return redirect('/admin/product/photo/list/' . $req->productId);
    }

    public function delete(Request $req)
    {
        $folder = ProductPhoto::path;
        $photo = ProductPhoto::find($req->id);
        if (is_file($folder . '/'. $photo->photo)) {
            // unlink:將檔案從硬碟中刪除
            @
            unlink($folder . '/'. $photo->photo);
        }

        if (is_file($folder . '/S/'. $photo->photo)) {
            unlink($folder . '/S/'. $photo->photo);
        }

        $photo->delete();
    }
}
