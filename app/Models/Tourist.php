<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tourist extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'provider',
        'provider_id',
        'access_token',
        'password',
        'contacts',
        'image',
        'dob',
        'passport',
        'status',
        'country',
        'support_document_url',
        'zip',
        'state',
        'address',
    ];

    protected $casts = [
        'contacts' => 'array',
    ];

    function bookings()
    {
        return $this->hasMany(Booking::class,'tourist_id');
    }
}
