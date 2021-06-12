<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'description',

    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
