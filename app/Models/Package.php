<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profile_id',
        'description',
        'total',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class,'package_offer');
    }

    public function profile()
    {
        return $this->belongsTo(HotelProfile::class,'profile_id');
    }
}
