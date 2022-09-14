<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = "subscriptions";
    
    protected $fillable = [
        'paystack_id',
        'user_id',
        'status',
        'plan_name',
        'email_token',
        'response',
        'start_date',
        'paystack_sub_code',
        'due_date',
    ];
}
