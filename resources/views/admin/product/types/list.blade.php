@extends('admin.layout')
@section('title','產品類別')
@section('content')
<main class="admin-content">
    <div class="admin-card" data-crud-list>
        <div class="admin-card-header">
            <h2><i class="fa fa-folder-open"></i> 產品分類列表</h2>
            <div class="admin-toolbar">
                <!-- 關鍵字即時查詢：輸入時自動篩選並標示關鍵字 -->
                <form class="search-box">
                    <i class="fa fa-search"></i>
                    <input type="search" name="keyword" class="form-control" placeholder="搜尋分類名稱" autocomplete="off" />
                </form>
                <button type="button" class="btn btn-light btn-sm" data-clear><i class="fa fa-times"></i> 清除</button>
                <a href="product-categories-form.html" class="btn btn-gold btn-sm"><i class="fa fa-plus"></i> 新增產品分類</a>
            </div>
        </div>

        <div class="table-wrap">
            <table class="data-table admin-table">
                <thead>
                    <tr>
                        <th>分類名稱</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($list) && sizeof($list)>0)
                    @foreach($list as $data)
                    <tr data-row>
                        <td data-mark>{{ $data->title }}</td>
                        <td>
                            <div class="actions"><a href="edit/{{ $data->id }}" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a>
                            <button type="button" class="btn btn-danger-outline btn-xs" data-name="{{ $data->title }}" onclick="doDelete('{{ $data->id }}', this, '/admin/product/types/delete')">
                                <i class="fa fa-trash"></i> 刪除</button></div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="2" class="text-center text-danger">目前無資料</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection