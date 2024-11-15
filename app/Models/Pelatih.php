<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'name',
        'picture',
        'description',
        'price',
        'email',
        'phone',
        'address',
        // 'available_days'
    ];

    // protected $casts = [
    //     'available_days' => 'array'
    // ];



    public function gym() {
        return $this->belongsTo(Gym::class);
    }

    public function transaction() {
        return $this->hasMany(Transaction::class);
    }
}
