<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public $timestamps = false;
    protected $table = 'product_type';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'title'];
}
