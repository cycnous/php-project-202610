@extends('admin/layout')
@section('title','新增大事記類別')
@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa fa-user-shield"></i> <span data-mode-text>新增大事記類別</span></h2>
        <a href="/admin/milestone/types/list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 返回列表</a>
    </div>
    <div class="admin-card-body">
        <!-- 
                        1. 在 MileStoneTypeController 中新增 function store
                        2. 在路由新增 Route::post('/admin/milestone/types/store', [MileStoneTypeController::class, 'store'])
                        3. 新增完成後, 要告知使用者已新增完畢
                        4. 告知提示會使用sweetalert2, 要在列表(list.blade.php)中引入 sweetalert2 的 css & js

                     -->
        <form class="admin-form" action='/admin/milestone/types/store' method='post'>
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="label">標籤 <span class="req">*</span></label>
                    <input type="text" id="label" name="label" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="title">標題 <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
                <a href="/admin/milestone/types/list" class="btn btn-outline"><i class="fa fa-times"></i> 取消</a>
            </div>
        </form>
    </div>
</div>
@endsection