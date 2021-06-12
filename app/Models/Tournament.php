<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable = [
        'tournament_name',
        'serial',
        'status',
        'location',
        'game_id',
        'user_id',
        'pin',
        'enddate',
        'registration',
        'total',
        'updateby',
        'totalplayer',


    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function pubgs()
    {
        return $this->hasMany(Pubg::class);
    }

    public function rule()
    {
        return $this->hasOne(Rule::class);
    }
}
