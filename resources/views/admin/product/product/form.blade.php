<div class="form-row">
    <div class="form-group">
        <label class="form-label" for="f_product_category_id">分類 <span class="req">*</span></label>
        <select id="f_product_category_id" name="product_category_id" class="form-control" required>
            <option value="">請選擇分類</option>
            @foreach($types as $data)
            <option value="{{ $data->id }}">{{ $data->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label" for="f_product_category_id">標籤 <span class="req">*</span></label>
        <select id="f_product_category_id" name="product_category_id" class="form-control">
            <option value="">請選擇標籤</option>
            @foreach($labels as $data)
            <option value="{{ $data->id }}">{{ $data->label }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label class="form-label" for="f_product_no">商品編號 <span class="req">*</span></label>
        <input type="text" id="f_product_no" name="productNo" value="" class="form-control" required placeholder="A-00123">
    </div>
</div>

<div class="form-group">
    <label class="form-label" for="f_title">商品名稱 <span class="req">*</span></label>
    <input type="text" id="productName" name="productName" value="" class="form-control" required>
</div>

<div class="form-group">
    <label class="form-label" for="f_subtitle">標題</label>
    <input type="text" id="title" name="title" value="" class="form-control">
</div>

<div class="form-row-3">
    <div class="form-group">
        <label class="form-label" for="f_price">售價 <span class="req">*</span></label>
        <input type="number" id="f_price" name="salePrice" value="" class="form-control" min="0" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="f_original_price">原價</label>
        <input type="number" id="f_original_price" name="price" value="" class="form-control" min="0">
    </div>
    <div class="form-group">
        <label class="form-label" for="f_stock">庫存</label>
        <input type="number" id="f_stock" name="qty" value="100" class="form-control" min="0">
    </div>
</div>

<div class="form-group">
    <label class="form-label" for="f_content">商品內容</label>
    <textarea id="content" name="content" rows="10" class="form-control font-en"></textarea>
    <p class="field-hint">可使用 HTML：&lt;h3&gt;小標&lt;/h3&gt;、&lt;p&gt;段落&lt;/p&gt;</p>
</div>

<!-- AI 建議標題及內容 -->
<div class="form-group">
    <button type="button" class="btn btn-gold btn-sm" id="aibtn" onclick="doAI()">
        <i class="fa fa-magic"></i> AI 建議標題及內容
    </button>
    <span class="field-hint">依上面輸入的產品名稱、標題、內容，請 AI 建議寫法( 內容由 AI 產生，請自行調整及確認 )</span>
</div>

<!-- AI 建議結果, 先隱藏, 有結果才顯示 -->
<div class="alert alert-info hidden" id='aibox'>
    <div style="width: 100%;">
        <div style="margin-bottom: 8px;"><b>建議標題</b><div id='aiTitle'></div></div>
        <!-- white-space: pre-line; 保留換行符號, 合併連續空格 -->
        <div style="margin-bottom: 12px;"><b>建議內容</b>
            <div id='aiContent' style="white-space: pre-line;"></div>
        </div>
        <button type="button" class="btn btn-success" onclick="useAI('title')">套用標題</button>
        <button type="button" class="btn btn-success" onclick="useAI('content')">套用內容</button>
        <button type="button" class="btn btn-success" onclick="useAI('title'),useAI('content')">全部套用</button>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
    <a href="products.html" class="btn btn-outline"><i class="fa fa-times"></i> 取消</a>
</div>

<script>
    function doAI() {
        const btn = $('#aibtn'); // AI 建議標題及內容的 button
        btn.prop('disabled', true).html("<i class='fa fa-spinner fa-spin'></i> AI 思考中 ..."); // 按下按鈕後關閉功能, 避免使用者一直重複按
        $.ajax({
            url: "/admin/product/product/doAI",
            type: "post",
            data: {
                productName : $('#productName').val(),
                title : $('#title').val(),
                content: $('#content').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(msg)
            {
                if (msg.error)
                {
                    Swal.fire(msg.error, '', 'error');
                    return;
                }
                $('#aiTitle').text(msg.title);
                $('#aiContent').text(msg.content);
                $('#aibox').removeClass('hidden');
            },
            error: function()
            {
                Swal.fire('AI 呼叫失敗, 請稍後再試', '', 'error');
            },
            complete: function()
            {
                btn.prop('disabled', false).html("<i class='fa fa-magic'></i> AI 建議標題及內容"); 
            }
        });
    }

    function useAI(msg)
    {
        if (msg == 'title')
        {
            $('#title').val($('#aiTitle').text());
        }
        if (msg == 'content')
        {
            $('#content').val($('#aiContent').text());
        }
    }
</script>