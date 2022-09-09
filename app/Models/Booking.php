<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'tourist_id',
        'start_date',
        'end_date',
        'room_id',
        'offer_id',
        'status',
        'rating',
        'comment',
        'complaint',
        'pkg_qty',
        'total',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class,'booking_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

    public function room()
    {
        return $this->belongsTo(Package::class,'room_id');
    }

    public function tourist()
    {
        return $this->belongsTo(Tourist::class,'tourist_id');
    }

}
