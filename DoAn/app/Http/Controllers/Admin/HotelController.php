<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class HotelController extends Controller
{
    private Hotel $hotel;

    public function __construct() {
        $this->hotel = new Hotel();
    }

    public function index(){
        return view('admin.hotel.hotel',[
            'title' => 'Khách sạn',
            'active' => 4,
            'hotel' => $this->getAllHotel(),
        ]);
    }

    public function getAllHotel(){
        return $this->hotel::orderBy('id', 'desc')->get();
    }

    public function addPage(){
        return view('admin.hotel.add',[
            'title' => 'Thêm khách sạn',
            'active' => 4,
        ]);
    }

    public function addHotel(Request $request){

        $this->hotel->name = $request->input('name');
        $this->hotel->price = (double) $request->input('price');
        $this->hotel->address = $request->input('address');
        $this->hotel->status = $request->input('status');
        $this->hotel->rating = $request->input('rating');
        $this->hotel->map = $request->input('map');
        $this->hotel->save();
    
        $get_image = $request->file('image');
        $stt = 0;
        foreach ($get_image as $image) {
            $name_image = 'image'.$stt++;
            $new_image = 'hotel_' . md5(Str::random(10) . rand(0, 999999) . now()->milli) . '.' . $image->getClientOriginalExtension();
            $image->move('picture/hotel', $new_image);
            $hotelImage = new HotelImage();
            $hotelImage->name = $name_image;
            $hotelImage->image_url = $new_image;
            $hotelImage->hotel_id = $this->hotel->id;
            $hotelImage->save();
        }
        return redirect('/admin/hotel')->with('success', 'Thêm khách sạn thành công');

    }

    public function getAllImage(){
        $image = new HotelImage();
        return $image->first();

    }

    public function updatePage(Hotel $hotel){
        return view('admin.hotel.update',[
            'title' => 'Cập nhật khách sạn',
            'active' => 4,
            'hotel' => $hotel
        ]);
    }

    public function updateHotel(Hotel $hotel, Request $request){
        $get_image = $request->file('image');
        $this->hotel=$hotel;
        $this->hotel->name = $request->input('name');
        $this->hotel->price = (double) $request->input('price');
        $this->hotel->address =$request->input('address');
        $this->hotel->status = $request->input('status');
        $this->hotel->rating = $request->input('rating');
        $this->hotel->map = $request->input('map');
        $this->hotel->save();

        foreach($this->hotel->hotelImages as $image){
            $image = public_path('picture/hotel/'.$image->image_url);
            File::delete($image);
        }
        HotelImage::where('hotel_id',$this->hotel->id)->delete();

        if(!is_null($get_image)){
            $stt = 0;
            foreach($get_image as $image){
                $name_image = 'image'.$stt++;
                $new_image = 'hotel_' . md5(Str::random(10) . rand(0, 999999) . now()->milli) . '.' . $image->getClientOriginalExtension();
                $image->move('picture/hotel', $new_image);
                $hotelImage = new HotelImage();
                $hotelImage->name = $name_image;
                $hotelImage->image_url = $new_image;
                $hotelImage->hotel_id = $this->hotel->id;
                $hotelImage->save();
            }
        }
        return redirect('/admin/hotel')->with('success','Cập nhật khách sạn thành công');
        
    }

    public function deleteHotel(Request $request){
        $id = $request->input('id');
        $hotel = $this->hotel::find($id);
        if(!is_null($hotel)){
            foreach($hotel->hotelImages as $image){
                $image = public_path('picture/hotel/'.$image->image_url);
                File::delete($image);
            }
            HotelImage::where('hotel_id',$id)->delete();
            $hotel->delete();
            return response() ->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }
        return response() ->json([
            'error' => true,
        ]);
    }


}
