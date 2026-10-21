@extends('admin.layout');
@section('title', '帳號管理');
@section('content')
<div class="admin-card" data-crud-list>
    <div class="admin-card-header">
        <h2><i class="fa fa-user-shield"></i> 管理員列表</h2>
        <div class="admin-toolbar">
            <!-- 關鍵字即時查詢：輸入時自動篩選並標示關鍵字 -->
            <form class="search-box">
                <i class="fa fa-search"></i>
                <input type="search" name="keyword" class="form-control" placeholder="搜尋姓名 / 帳號 / Email" autocomplete="off" />
            </form>
            <button type="button" class="btn btn-light btn-sm" data-clear><i class="fa fa-times"></i> 清除</button>
            <a href="/admin/manager/create" class="btn btn-gold btn-sm"><i class="fa fa-plus"></i> 新增帳號</a>
        </div>
    </div>

    <div class="table-wrap">
        <table class="data-table admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>帳號</th>
                    <th>密碼</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $data)
                <tr data-row>
                    <td data-mark>{{ $data->id }}</td>
                    <td data-mark>{{ $data->userId }}</td>
                    <td data-mark>{{ $data->pwd }}</td>
                    <td>
                        <div class="actions">
                            <a href="/admin/manager/edit/{{ $data->id }}" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a>
                            <button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="系統管理員" data-blocked="不能刪除目前登入中的帳號"><i class="fa fa-trash"></i> 刪除</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="admin-table-info">
        <span>共 <b>{{ $total }}</b> 筆</span>
        {{ $list->links() }}
    </div>
</div>
@endsection