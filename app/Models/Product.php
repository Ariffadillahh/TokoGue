<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_product',
        'desc_product',
        'stock_product',
        'name_brand',
        'image_product',
        'product_status',
        'price_product',
    ];
}
