@extends('admin.layout');
@section('title', '新建帳號');
@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa fa-user-shield"></i> <span data-mode-text>新增帳號</span></h2>
        <a href="/admin/manage/list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 返回列表</a>
    </div>
    <div class="admin-card-body">
        <!-- 網址帶 ?id=編號 時為「修改」，會自動帶入資料 -->
        <form class="admin-form" action='/admin/manager/store' method='post'>
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="f_name">姓名 <span class="req">*</span></label>
                    <input type="text" id="f_name" name="name" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="f_username">登入帳號 <span class="req">*</span></label>
                    <input type="text" id="f_username" name="username" value="" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="f_email">電子郵件</label>
                <input type="email" id="f_email" name="email" value="" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label" for="f_password"><span data-password-label>密碼</span> <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" id="f_password" name="password" class="form-control" placeholder="至少 8 個字元" autocomplete="new-password" required data-required-on-create>
                </div>
            </div>
            <div class="form-group">
                <label class="form-check"><input type="checkbox" name="is_active" value="1" checked> 啟用（自己的帳號無法停用）</label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
                <a href="admins.html" class="btn btn-outline"><i class="fa fa-times"></i> 取消</a>
            </div>
        </form>
    </div>
</div>
@endsection