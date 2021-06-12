<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_name',
        'logo',
        'tournament_id',
        'user_id',
        'rzs',
        'location',

    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
    public function pubgs()
    {
        return $this->hasMany(Pubg::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
