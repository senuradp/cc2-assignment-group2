<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'date',
        'stripe_id',
        'card_last_four',
        'card_brand',
        'booking_id',
    ];

}
