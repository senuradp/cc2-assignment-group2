<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'name',
        'price',
        'bathrooms_qty',
    ];

    public function facilities()
    {
        return $this->belongsToMany(Facilitie::class);
    }
    public function beds()
    {
        return $this->belongsToMany(Bed::class)->withPivot(['capacity']);
    }
}
