<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'picture',
        'description',
        'alamat',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pelatih() {
        return $this->hasMany(Pelatih::class);
    }

    public function cardMember() {
        return $this->hasMany(CardMember::class);
    }
}
