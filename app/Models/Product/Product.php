<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public $timestamps = false;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'productName', 'title', 'productNo', 'price', 'salePrice', 'qty', 'content', 'createTime'];

    public function types(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'typeId', 'id');
    }
}
