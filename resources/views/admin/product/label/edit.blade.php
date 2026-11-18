@extends('admin.layout')
@section('title','修改產品標籤')
@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2><i class="fa fa-folder-open"></i> <span data-mode-text>修改產品標籤</span></h2>
            <a href="../list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 返回列表</a>
        </div>
        <div class="admin-card-body">
            <!-- 網址帶 ?id=編號 時為「修改」，會自動帶入資料 -->
            <form class="admin-form" method="post" action="../update">
                <input type="hidden" name='id' value="{{ $label->id }}">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="f_name">標籤名稱 <span class="req">*</span></label>
                        <input type="text" id="f_name" name="label" value="{{ $label->label }}" class="form-control" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
                    <!-- 因為修改會帶edit\{id}, 所以返回列表要多回到上層(../list) -->
                    <a href="../list" class="btn btn-outline"><i class="fa fa-times"></i> 取消</a>
                </div>
            </form>
        </div>
    </div>
@endsection