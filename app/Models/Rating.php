<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_orders',
        'komentar',
        'start_rate',
        'id_user',
        'waktu_rate',
        'status_rate'
    ];

    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }
}
