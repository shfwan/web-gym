<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gym_id',
        'pelatih_id',
        'latihan',
        'status',
        'date',
        'total_price'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
