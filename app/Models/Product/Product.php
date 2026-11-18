<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public $timestamps = false;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'labelId', 'typeId',  'productName', 'title', 'productNo', 'price', 'salePrice', 'qty', 'content', 'createTime'];

    public function types(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'typeId', 'id');
    }

    public function labels(): BelongsTo
    {
        return $this->belongsTo(ProductLabel::class, 'labelId', 'id');
    }

    // 商品圖
    public function photos(): HasMany
    {
        return $this->hasMany(ProductPhoto::class, 'productId', 'id');
    }

    // 商品規格
    public function specs(): HasMany
    {
        return $this->hasMany(ProductSpec::class, 'productId', 'id');
    }

    // 取第一張圖, 放在產品列表的
    public function firstPhoto()
    {
        return $this->photos()->first();
    }
}
