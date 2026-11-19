@extends('admin.layout')
@section('title', '新增產品')
@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa fa-box-open"></i> <span data-mode-text>新增產品</span></h2>
        <a href="list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 返回列表</a>
    </div>
    <!-- 新增跟修改的表單一樣, 統一寫在admin.product.form -->
    <div class="admin-card-body">
        <form class="admin-form" action='store' method="post">
            @csrf
            @include('admin.product.product.form')
        </form>
    </div>
</div>
@endsection