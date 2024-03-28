<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Promotion;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    private Hotel $hotel;
    public function __construct() {
        $this->hotel = new Hotel();
    }

    public function hotelList(){
        $promotion = Promotion::orderBy('id', 'desc')->where('view_control',1)->get();
        return view('users.hotel.hotel_list',[
            'title' => 'Hotel',
            'active' => 3,
            'hotelList' => $this->getAllHotel(),
            'promotion' => $promotion
        ]);
    }

    public function getAllHotel(){
        return $this->hotel::orderBy('id', 'desc')->get();
    }

    public function hotelDetail(Hotel $hotel){
        $promotion = Promotion::orderBy('id', 'desc')->where('view_control',1)->get();
        return view('users.hotel.hotel_detail',[
            'title' => 'Thông tin hotel',
            'active' => 3,
            'hotel' => $hotel,
            'promotion' => $promotion
        ]);
    }

    public function searchHotel(Request $request){
         
        $searchHotel = $request->input('searchHotel');

        $hotel = Hotel::where('name', 'like', '%' . $searchHotel . '%')
        ->orWhere('address', 'like', '%' . $searchHotel . '%')
        ->get();

        $promotion = Promotion::orderBy('id', 'desc')->where('view_control',1)->get();
        return view('users.hotel.hotel_list',[
            'title' => 'Hotel',
            'active' => 3,
            'hotelList' => $hotel,
            'promotion' => $promotion
        ]);

    }

}
