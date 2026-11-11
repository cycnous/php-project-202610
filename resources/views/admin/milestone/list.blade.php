@extends('admin.layout')
@section('title','大事記列表')
@section('content')
<div class="admin-card" data-crud-list>
  <div class="admin-card-header">
    <h2><i class="fa fa-history"></i> 大事記列表</h2>
    <div class="admin-toolbar">
      <!-- 關鍵字即時查詢：輸入時自動篩選並標示關鍵字 -->
      <form class="search-box">
        <i class="fa fa-search"></i>
        <input type="search" name="keyword" class="form-control" placeholder="搜尋標題 / 說明 / 標籤 / 年份" autocomplete="off" />
      </form>
      <select name="tag_type" class="form-control" data-filter>
        <option value="">全部類型</option>
        <option value="milestone">里程碑</option>
        <option value="product">產品</option>
        <option value="award">獲獎 / 認證</option>
      </select>
      <button type="button" class="btn btn-light btn-sm" data-clear><i class="fa fa-times"></i> 清除</button>
      <a href="add" class="btn btn-gold btn-sm"><i class="fa fa-plus"></i> 新增大事記</a>
    </div>
  </div>

  <div class="table-wrap">
    <table class="data-table admin-table">
      <thead>
        <tr>
          <th>#</th>
          <th>年月</th>
          <th>標題</th>
          <th>類型</th>
          <th>標籤文字</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach($list as $data)
        <tr data-row data-tag_type="milestone">
          <td class="num text-muted">{{ $data->id }}</td>
          <td data-mark>{{ $data->years }} / {{ $data->months }}</td>
          <td data-mark>{{ $data->title }}</td>
          <td><span class="event-tag tag-{{ $data->types->label }}" data-mark>{{ $data->types->title }}</span></td>
          <td data-mark>{{ $data->types->title }}</td>
          <td>
            <div class="actions">
              <a href="edit/{{ $data->id }}" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a>
              <button type="button" class="btn btn-danger-outline btn-xs" onclick="doDelete('{{ $data->id }}', this, '/admin/milestone/delete')">
                <i class="fa fa-trash"></i> 刪除</button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="admin-table-info">
    {{ $list->links() }}
  </div>
</div>
@endsection