<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPhoto extends Model
{
    public $timestamps = false;
    protected $table = 'product_photo';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'productId', 'photo', 'createTime'];

    // 圖片可以放在 public(公開) 或 storage(私有)
    // storage 需要透過程式才能讀取, 路徑用 storage_path
    const path = "product";

    // 大圖
    // self::path : 是指上面的 const path = "product";
    public function big()
    {
        return '/' . self::path . '/' . $this->photo;
    }

    // 小圖
    public function small()
    {
        return '/' . self::path . '/S' . $this->photo;
    }

    // 產品圖屬於哪個產品
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }
}
