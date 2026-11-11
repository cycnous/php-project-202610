<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductLabel extends Model
{
    public $timestamps = false;
    protected $table = 'product_label';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'label'];
}
