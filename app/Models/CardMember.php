<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardMember extends Model
{
    use HasFactory, HasUuids;

    public $fillable = [
        'gym_id',
        'title',
        'price',
        'description',
        'long',
        'type',
    ];

    public function gym() {
        return $this->belongsTo(Gym::class);
    }
}
