<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class SizeProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'uk_size',
        'id_product'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
