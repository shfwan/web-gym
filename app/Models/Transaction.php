<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'gym_id',
        'product_id',
        'type',
        'status',
        'date',
        'total_price',
        'snap_token',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pelatih() {
        return $this->belongsTo(Pelatih::class);
    }

}
