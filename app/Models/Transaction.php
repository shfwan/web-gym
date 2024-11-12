<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gym_id',
        'pelatih_id',
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
