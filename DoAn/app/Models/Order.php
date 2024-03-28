<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $attributes = [

    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function tours()
    {
        return $this->belongsTo(Tour::class,'tour_id');
    }

    public function typeConfims()
    {
        return $this->belongsTo(TypeConfim::class,'type_confim_id');
    }

    public function payments()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}
