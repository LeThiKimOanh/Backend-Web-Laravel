<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $attributes = [

    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addSlider($slider_data){
        
        $row = DB::insert("INSERT INTO slider(name,status,image,user_id) VALUE (?, ?, ?, ?)",$slider_data);

        
    }
}
