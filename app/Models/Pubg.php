<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pubg extends Model
{
    use HasFactory;

    protected $fillable = [
        'pubg_id_name',
        'pubg_id_number',
        'tournament_id',
        'team_id',
        'playertype',
        'playerserial',

    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
