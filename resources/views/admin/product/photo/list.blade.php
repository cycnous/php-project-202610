@extends('admin.layout')
@section('title', '產品圖管理')
@section('content')
<script>
    function checkFile() {
        const maxSize = 5 * 1024 * 1024; // 5MB
        var file = document.getElementById('photo');
        for (let i = 0; i < file.files.length; i++) {
            if (file.files[$i].size > maxSize) {
                $('#msg').html("<font color='red'>" + file.files[$i].name + " 超過5MB, 請重新選擇檔案</font>");
                // 將圖檔清空
                $('#photos').val('');
                return false;
            }
        }
    }
</script>
<div class="admin-card" data-crud-list>
    <div class="admin-card-header">
        <h2><i class="fa fa-image"></i> 產品圖: {{ $product->productNo }} {{ $product->productName }}</h2>
        <div class="admin-toolbar">
            <a href="/admin/product/spec/list/{{ $productId }}" class="btn btn-outline btn-sm"><i class="fa fa-list-ul"></i> 產品規格</a>
            <a href="../../product/list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 回產品列表</a>
        </div>
    </div>
    <div class="admin-card-body">
        <!-- 上傳檔案一定要加上 enctype="multipart/form-data" -->
        <form class="admin-form" action="../store" method="post" enctype="multipart/form-data">
            <input type="hidden" name="productId" value="{{ $productId }}">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
                @endforeach
            </div>
            @endif
            <div class="form-group">
                <label class="form-label" for="photos"> 上傳圖檔 (可一次選取多張圖)</label>
                <!-- 
                        multiple: 可選取多個
                        name="photo[]": 陣列, 儲存多張圖
                        accept: 限定種類
                    -->
                <input type="file" name="photo[]" id="photos" accept="image/jpge, .jpg, .jpeg" class="
                    form-control" multiple required onchange="checkFile()">
                <p class="field-hint">限上傳jpg, jpeg, 每張圖最大5MB</p>
                <div id="msg"></div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> 上傳</button>
            </div>
        </form>
    </div>
    <div class="table-wrap">
        <table class="data-table admin-table">
            <thead>
                <tr>
                    <th>圖檔</th>
                    <th>檔名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse($list as $data)
                <tr data-row>
                    <td>
                        <a href="{{ $data->big() }}" data-lightbox="{{ $product->productName }}" data-title="{{ $product->productName }}"></a>
                        <img src="{{ $data->small() }}">
                    </td>
                    <td class="text-center">{{ $data->photo }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger-outline btn-xs" onclick="doDelete('{{ $data->id }}', this, '/admin/product/photo/delete')"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-danger"><i class="fa fa-image"></i> 目前沒有產品圖</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection