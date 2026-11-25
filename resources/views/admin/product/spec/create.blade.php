@extends('admin.layout')
@section('title', '產品規格')
@section('content')
<div class="admin-card" data-crud-list>
    <div class="admin-card-header">
        <h2><i class="fa fa-image"></i> 產品規格: {{ $product->productNo }} {{ $product->productName }}</h2>
        <div class="admin-toolbar">
            <a href="/admin/product/product/list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 回產品列表</a>
        </div>
    </div>
    <div class="admin-card-body">
        <form class="admin-form" action="/admin/product/spec/store" method="post">
            <input type="hidden" name="productId" value="{{ $product->id }}">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="title">規格名稱</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="content">規格內容</label>
                    <input type="text" id="content" name="content" class="form-control" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 確 定 </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection