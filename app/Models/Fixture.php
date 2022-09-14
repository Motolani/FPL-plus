<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Fixture extends Model
{
    use HasFactory;
    protected $table = "fixtures";
    
    protected $fillable = [
        'id',
        'event',
        'type_id',
        'finished',
        'kickoff_time',
        'minutes',
        'provisional_start_time',
        'started',
        'team_a_id',
        'team_a_score',
        'team_h_id',
        'team_h_score',
        'stats',
        'team_h_difficulty',
        'team_a_difficulty',
        'pulse_id',
        'code',
        'finished_provisional'
    ];

}
