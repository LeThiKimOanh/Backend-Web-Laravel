<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $attributes = [

    ];

    public function hotelImages()
    {
        return $this->hasMany(HotelImage::class,'hotel_id');
    }
}
