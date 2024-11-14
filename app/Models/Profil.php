<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'picture',
        'bio',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
