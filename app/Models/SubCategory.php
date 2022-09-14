<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "subscription_categories";
    
    protected $fillable = [
        'name',
        'payment_interval',
        'amount',
        'paystack_id',
        'description',
        'creator_id',
        'response',
    ];
}
