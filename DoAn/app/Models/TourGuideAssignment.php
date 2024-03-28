<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuideAssignment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $table = 'tour_guide_assignments';

    protected $attributes = [

    ];

    public function tours()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    public function tourGuide()
    {
        return $this->belongsTo(TourGuide::class, 'tour_guide_id');
    }
}
