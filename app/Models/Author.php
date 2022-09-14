<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = "authors";
    
    protected $fillable = [
        'user_id',
        'name',
        'last_login',
        'intro',
        'profile',
    ];
}
