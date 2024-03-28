<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'comments';
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
}
