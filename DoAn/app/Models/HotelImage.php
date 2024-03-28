<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $table = 'hotel_images';

    protected $attributes = [

    ];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class);
    }
}
