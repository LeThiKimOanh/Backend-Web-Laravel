<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourGuideAssignment;
use App\Models\TourImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TourController extends Controller
{
    private Tour $tour;

    public function __construct() {
        $this->tour = new Tour();
    }

    public function index(){
        return view ('admin.tour.tour',[
            'title' => 'Tour',
            'active' => 3,
            'childActive' => 1,
            'tour' => $this->getAllTour(),
        ]);
    }

    public function getAllTour(){
        return $this->tour::orderBy('id', 'desc')->get();
    }

    public function addPage(){
        $tour_category = new TourCategoryController();
        $tour_category_id = $tour_category->getAllTourCategory();
        $promotion = new PromotionController();
        $promotion_id = $promotion->getAllPromotion();
        $hotel = new HotelController();
        $hotel_id = $hotel->getAllHotel();
        $tour_guide = new TourGuideController();
        $tour_guide_id = $tour_guide->getAllTourGuide();
        return view('admin.tour.add',[
            'title' => 'Tạo tour mới',
            'active' => 3,
            'childActive' => 1,
            'tour_category' => $tour_category_id,
            'hotel' => $hotel_id,
            'promotion' => $promotion_id,
            'tour_guide' => $tour_guide_id,
        ]);
    }

    public function addTour(Request $request){

        $this->tour->name = $request->input('name');
        $this->tour->price_adult = $request->input('price_adult');
        $this->tour->price_child = $request->input('price_child');
        $this->tour->number_of_people = $request->input('number_of_people');
        $this->tour->start_date = $request->date('start_date');
        $this->tour->end_date = $request->date('end_date');
        $this->tour->departure_address = $request->input('departure_address');
        $this->tour->destination_address = $request->input('destination_address');
        $this->tour->schedules = $request->input('schedules');
        $this->tour->status = $request->input('status');
        $this->tour->tour_category_id = $request->input('tour_category_id');
        $this->tour->promotion_id = $request->input('promotion_id');
        $this->tour->hotel_id = $request->input('hotel_id');
        $this->tour->map = $request->input('map');
        $this->tour->rating = $request->input('rating');
        $this->tour->save();

        $get_image = $request->file('image');
        $stt = 0;
        foreach ($get_image as $image) {
            $name_image = 'image'.$stt++;
            $new_image = 'tour_' . md5(Str::random(10) . rand(0, 999999) . now()->milli) . '.' . $image->getClientOriginalExtension();
            $image->move('picture/tour', $new_image);
            $tour_image = new TourImage();
            $tour_image->name = $name_image;
            $tour_image->image_url = $new_image;
            $tour_image->tour_id = $this->tour->id;
            $tour_image->save();
        }
        $tour_guide_id = $request->input('tour_guide_id');
        foreach ($tour_guide_id as $tour_guide) {
            $tour_guide_assignment = new TourGuideAssignment();
            $tour_guide_assignment->tour_guide_id = $tour_guide;
            $tour_guide_assignment->tour_id = $this->tour->id;
            $tour_guide_assignment->save();
        }

        return redirect('/admin/tour')->with('success', 'Thêm mới tour thành công');


    }

    public function deleteTour(Request $request){
        $id = $request->input('id');
        $tour = $this->tour::find($id);
        if(!is_null($tour)){
            foreach($tour->tourImages as $image){
                $image = public_path('picture/tour/'.$image->image_url);
                File::delete($image);
            }
            TourImage::where('tour_id',$id)->delete();
            TourGuideAssignment::where('tour_id',$id)->delete();
            $tour->delete();
            return response() ->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }
        return response() ->json([
            'error' => true,
        ]);
    }

    public function updatePage(Tour $tour){
        $tour_category = new TourCategoryController();
        $tour_category_id = $tour_category->getAllTourCategory();
        $promotion = new PromotionController();
        $promotion_id = $promotion->getAllPromotion();
        $hotel = new HotelController();
        $hotel_id = $hotel->getAllHotel();
        $tour_guide = new TourGuideController();
        $tour_guide_id = $tour_guide->getAllTourGuide();

        return view('admin.tour.update',[
            'title' => 'Cập nhật tour',
            'active' => 3,
            'childActive' => 1,
            'tour_category' => $tour_category_id,
            'hotel' => $hotel_id,
            'promotion' => $promotion_id,
            'tour_guide' => $tour_guide_id,
            'tour' => $tour
        ]);
    }

    public function showTour(Tour $tour){
        return view('admin.tour.view',[
            'title' => 'Chi tiết tour',
            'active' => 3,
            'childActive' => 1,
            'tour' => $tour
        ]);
    }


}
