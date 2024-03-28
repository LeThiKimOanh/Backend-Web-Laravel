<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $table = 'tours';
    
    public function tourCategories()
    {
        return $this->belongsTo(TourCategory::class, 'tour_category_id');
    }

    public function promotions()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function hotels()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function tourImages()
    {
        return $this->hasMany(TourImage::class,'tour_id');
    }

    public function tourGuideAssignment()
    {
        return $this->hasMany(TourGuideAssignment::class,'tour_id');
    }
}

