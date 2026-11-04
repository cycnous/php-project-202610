 <!-- 套樣板
      1. <main class="admin-content">
            只保留這裡面的內容, 其餘刪除
         </main> 
      2. 加上 extends, section 等繼承語法
 -->
 
 @extends('admin.layout')
 @section('title', '大事記類別')
 @section('content')
 <div class="admin-card" data-crud-list>
     <div class="admin-card-header">
         <h2><i class="fa fa-history"></i> 大事記類別</h2>
         <div class="admin-toolbar">
             <!-- 關鍵字即時查詢：輸入時自動篩選並標示關鍵字 -->
             <form class="search-box">
                 <i class="fa fa-search"></i>
                 <input type="search" name="keyword" class="form-control" placeholder="搜尋標籤 / 標題" autocomplete="off" />
             </form>
             <!-- <select name="tag_type" class="form-control" data-filter>
                            <option value="">全部類型</option>
                            <option value="milestone">里程碑</option>
                            <option value="product">產品</option>
                            <option value="award">獲獎 / 認證</option>
                        </select> -->
             <button type="button" class="btn btn-light btn-sm" data-clear><i class="fa fa-times"></i> 清除</button>
             <a href="/admin/milestone/types/create" class="btn btn-gold btn-sm"><i class="fa fa-plus"></i> 新增大事記類別</a>
         </div>
     </div>

     <div class="table-wrap">
         <table class="data-table admin-table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>標籤</th>
                     <th>標題</th>
                     <th>操作</th>
                 </tr>
             </thead>
             <tbody>
                 <!-- 保留第一個tr, 其餘刪除 -->
                 @foreach($list as $data)
                 <tr data-row>
                     <td class="num text-muted">{{ $data->id }}</td>
                     <td><span class="badge badge-{{ $data->label }}" data-mark>{{ $data->title }}</span></td>
                     <td data-mark>{{ $data->title }}</td>
                     <td>
                         <div class="actions">
                             <a href="/admin/milestone/types/edit/{{ $data->id }}" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a>
                             <!-- doDelete 加上 this -->
                             <button type="button" class="btn btn-danger-outline btn-xs" onclick="doDelete('{{ $data->id }}', this)"><i class="fa fa-trash"></i> 刪除</button>
                         </div>
                     </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </div>

     <div class="admin-table-info">
         <span>共 <b data-total>8</b> 筆</span>
         <nav class="pagination">
             <span class="disabled"><i class="fa fa-chevron-left"></i></span>
             <span class="active">1</span>
             <span class="disabled"><i class="fa fa-chevron-right"></i></span>
         </nav>
     </div>
 </div>
@endsection