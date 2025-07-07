<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'id_alamat',
        'id_user',
        'qty_orders',
        'status_pembayaran',
        'status_orders',
        'date_orders',
        'total_harga',
        'size',
        'harga_product',
        'order_id'
    ];
}