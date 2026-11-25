@extends('admin.layout')
@section('title', '產品規格')
@section('content')
<div class="admin-card" data-crud-list>
    <div class="admin-card-header">
        <h2><i class="fa fa-image"></i> 產品規格: {{ $product->productNo }} {{ $product->productName }}</h2>
        <div class="admin-toolbar">
            <a href="/admin/product/spec/create/{{ $product->id }}" class="btn btn-outline btn-sm"><i class="fa fa-list-ul"></i> 新增產品規格</a>
            <a href="/admin/product/product/list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 回產品列表</a>
        </div>
    </div>
    <div class="table-wrap">
        <table class="data-table admin-table">
            <thead>
                <tr>
                    <th class="text-center">規格名稱</th>
                    <th class="text-center">規格內容</th>
                    <th class="text-center">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse($list as $data)
                    <tr data-row>
                        <td class="text-center">{{ $data->title }}</td>
                        <td class="text-center">{{ $data->content }}</td>
                        <td class="text-center">
                            <div class="actions">
                                <a href="/admin/product/spec/edit/{{ $data->id }}" class="btn btn-success"><i class="fa fa-edit"></i> 修改</a>
                                <button type="button" class="btn btn-danger btn-xs" onclick="doDelete('{{ $data->id }}', this, '/admin/product/spec/delete')"> 刪除</button>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-danger">目前無資料</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection