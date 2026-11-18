@extends('admin.layout')
@section('title','產品管理')
@section('content')
<div class="admin-card" data-crud-list>
    <div class="admin-card-header">
        <h2><i class="fa fa-box-open"></i> 產品列表</h2>
        <div class="admin-toolbar">
            <!-- 關鍵字即時查詢：輸入時自動篩選並標示關鍵字 -->
            <form class="search-box">
                <i class="fa fa-search"></i>
                <input type="search" name="keyword" class="form-control" placeholder="搜尋名稱 / 編號 / 分類" autocomplete="off" />
            </form>
            <select name="product_category_id" class="form-control" data-filter>
                <option value="">全部分類</option>
                @foreach($types as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
                @endforeach
            </select>
            <select name="is_active" class="form-control" data-filter>
                <option value="">全部狀態</option>
                <option value="1">上架</option>
                <option value="0">下架</option>
            </select>
            <button type="button" class="btn btn-light btn-sm" data-clear><i class="fa fa-times"></i> 清除</button>
            <a href="create" class="btn btn-gold btn-sm"><i class="fa fa-plus"></i> 新增產品</a>
        </div>
    </div>

    <div class="table-wrap">
        <table class="data-table admin-table">
            <thead>
                <tr>
                    <th>圖片</th>
                    <th>編號</th>
                    <th>名稱</th>
                    <th>分類</th>
                    <th>售價</th>
                    <th>庫存</th>
                    <th>標籤</th>
                    <th>狀態</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($list) && sizeof($list)>0)
                    @foreach($list as $data)
                    <tr data-row data-product_category_id="1" data-is_active="1">
                        <td>
                            @if($data->firstPhoto())
                                <img src="/product/S/{{ $data->firstPhoto()->photo }}">
                            @else
                                <div class="thumb-ph ph"><i class="fa fa-cube"></i></div>
                            @endif
                        </td>
                        <td data-mark>{{ $data->productNo }}</td>
                        <td data-mark>{{ $data->productName }}</td>
                        <td><span class="badge badge-brand" data-mark>{{ $data->types->title }}</span></td>
                        <td class="num">NT$ {{ $data->salePrice }}</td>
                        <td>{{ $data->qty }}</td>
                        <td><span class="badge badge-green">{{ $data->labels->label }}</span></td>
                        <td><span class="badge badge-green">上架</span></td>
                        <td>
                            <div class="actions"><a href="products-form.html?id=1" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a>
                            <button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="旗艦系列 A1 精品"><i class="fa fa-trash"></i> 刪除</button></div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr data-empty class="hidden">
                        <td colspan="9">
                            <div class="empty-state"><i class="fa fa-search"></i>
                                <p>找不到符合的資料</p>
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="admin-table-info">
        <span>共 <b data-total>9</b> 筆</span>
        <nav class="pagination">
            <span class="disabled"><i class="fa fa-chevron-left"></i></span>
            <span class="active">1</span>
            <span class="disabled"><i class="fa fa-chevron-right"></i></span>
        </nav>
    </div>
</div>
@endsection