<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_name',
        'serial',
        'status',
        'location',

    ];

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }
}
