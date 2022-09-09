<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HotelUser extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['email', 'contact', 'first_name','last_name','username','password'];
}
