@extends('admin.layout');
@section('title','新增大事記')
@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa fa-history"></i> <span data-mode-text>新增大事記</span></h2>
        <a href="/admin/milestone/list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 返回列表</a>
    </div>
    <div class="admin-card-body">
        <!-- 網址帶 ?id=編號 時為「修改」，會自動帶入資料 -->
        <form class="admin-form" data-back="/admin/milestone/list" novalidate>
            <div class="form-row-3">
                <div class="form-group">
                    <label class="form-label" for="f_year">年份 <span class="req">*</span></label>
                    <input type="number" id="f_year" name="year" value="2026" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="f_month">月份</label>
                    <select id="f_month" name="month" class="form-control">
                        <option value="1">1 月</option>
                        <option value="2">2 月</option>
                        <option value="3">3 月</option>
                        <option value="4">4 月</option>
                        <option value="5">5 月</option>
                        <option value="6">6 月</option>
                        <option value="7">7 月</option>
                        <option value="8">8 月</option>
                        <option value="9">9 月</option>
                        <option value="10">10 月</option>
                        <option value="11">11 月</option>
                        <option value="12">12 月</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="f_tag_type">類型</label>
                    <select id="f_tag_type" name="tag_type" class="form-control">
                        <option value="milestone">里程碑</option>
                        <option value="product">產品</option>
                        <option value="award">獲獎 / 認證</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="f_title">標題 <span class="req">*</span></label>
                <input type="text" id="f_title" name="title" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="f_description">說明</label>
                <textarea id="f_description" name="description" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="f_tag_label">標籤文字</label>
                    <input type="text" id="f_tag_label" name="tag_label" value="" class="form-control" placeholder="例：里程碑 / 展店 / 認證">
                </div>
                <div class="form-group">
                    <label class="form-label" for="f_icon">標籤圖示</label>
                    <div class="input-icon-wrap">
                        <i class="fa fa-star icon" id="f_icon_icon"></i>
                        <input type="text" id="f_icon" name="icon" value="" class="form-control" placeholder="fa-star" data-icon-preview="f_icon_icon">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-check"><input type="checkbox" name="is_highlight" value="1"> 重點事件（時間軸顯示金色圓點）</label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
                <a href="/admin/milestone/list" class="btn btn-outline"><i class="fa fa-times"></i> 取消</a>
            </div>
        </form>
    </div>
</div>
@endsection