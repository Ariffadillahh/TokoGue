<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_penerima',
        'no_hp',
        'name_provinsi',
        'name_kota',
        'name_kecamatan',
        'name_kelurahan',
        'alamat_detail',
        'id_user'
    ];
}
