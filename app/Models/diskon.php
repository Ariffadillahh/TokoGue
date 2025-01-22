<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diskon extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'persen_diskon',
        'total_harga',
        'tanggal_berlaku',
        'status',
    ];
}
