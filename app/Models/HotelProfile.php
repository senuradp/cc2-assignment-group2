<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;

class HotelProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "leagal_name",
        "contacts",
        "address",
        "lat",
        "lng",
        "description",
        "logo",
        "images",
        "status",
        "facebook_link",
        "video_url",
        "registration_fee_status",
        "stripe_id",
        "card_last_four",
        "card_brand",
        "reg_free",
        "hotel_type_id",
        "city_id",
    ];

    protected $casts = [
        'images' => 'array',
        'contacts' => 'array',
    ];

    public function packeges()
    {
        return $this->hasMany(Package::class,'profile_id');
    }

    public function users()
    {
        return $this->hasMany(HotelUser::class,'hotel_profile_id');
    }

    public function hotelType()
    {
        return $this->belongsTo(HotelType::class,'hotel_type_id');
    }

    public function city()
    {
        return $this->belongsTo(Citie::class,'city_id');
    }


}
