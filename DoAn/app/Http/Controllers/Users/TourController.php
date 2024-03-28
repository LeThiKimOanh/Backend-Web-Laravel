<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Promotion;
use App\Models\Tour;
use App\Models\TourGuideAssignment;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TourController extends Controller
{
    private Tour $tour;
    public function __construct() {
        $this->tour = new Tour();
    }

    public function tourList(){
        $promotion = Promotion::orderBy('id', 'desc')->where('view_control',1)->get();
        return view('users.tour.tour_list',[
            'title' => 'Tours',
            'active' => 2,
            'tourList' => $this->getAllTour(),
            'promotion' => $promotion
        ]);
    }

    public function getAllTour(){
        return $this->tour::orderBy('id', 'desc')->get();
    }

    public function tourDetail(Tour $tour){
        // $tourAssignment = TourGuideAssignment::where('tour_id', $tour->id)->get();
        // dd($tourAssignment);
        $comment = Comment::orderBy('id', 'desc')->where('tour_id',$tour->id)->get();
        $promotion = Promotion::orderBy('id', 'desc')->where('view_control',1)->get();
        $tours = Tour::whereNotIn('id', [$tour->id])->get();
        return view('users.tour.tour_detail',[
            'title' => 'Thông tin tour',
            'active' => 2,
            'tour' => $tour,
            'tours' => $tours,
            'promotion' => $promotion,
            'comment' => $comment
        ]);
    }

    public function searchTour(Request $request){
         
        $searchTour = $request->input('searchTour');
        $tour = Tour::where(function($query) use ($searchTour) {
            $query->where('name', 'like', '%' . $searchTour . '%')
                  ->orWhere('departure_address', 'like', '%' . $searchTour . '%')
                  ->orWhere('destination_address', 'like', '%' . $searchTour . '%')
                  ->orWhere('price_adult', 'like', '%' . $searchTour . '%')
                  ->orWhere('price_child', 'like', '%' . $searchTour . '%');
        })->get();

        $promotion = Promotion::orderBy('id', 'desc')->where('view_control',1)->get();
        return view('users.tour.tour_list',[
            'title' => 'Tours',
            'active' => 2,
            'tourList' => $tour,
            'promotion' => $promotion
        ]);
    }

    public function search(Request $request){

        // $start_date = $request->input('start_date');
        // $end_date = $request->input('end_date');

        // if($start_date){
        //     $date_1 = DateTime::createFromFormat('d/m/Y', $request->input('start_date'));
        //     $start_date = $date_1->format('Y-m-d');
        // }

        // if($end_date){
        //     $date_2 = DateTime::createFromFormat('d/m/Y', $request->input('end_date'));
        //     $end_date = $date_2->format('Y-m-d');
        // }

        $tour = Tour::where(function($query) use ($request) {
            $query->where('name', 'like', '%' . $request->input('name') . '%')
                  ->orWhere('destination_address', 'like', '%' . $request->input('destination_address') . '%')
                  ->orWhere('departure_address', 'like', '%' . $request->input('departure_address') . '%')
                  ->orWhere('start_date', 'like', '%' . $request->date('start_date') . '%')
                  ->orWhere('end_date', 'like', '%' . $request->date('end_date') . '%');
        })->get();

        $promotion = Promotion::orderBy('id', 'desc')->where('view_control',1)->get();
        return view('users.tour.tour_list',[
            'title' => 'Tours',
            'active' => 2,
            'tourList' => $tour,
            'promotion' => $promotion
        ]);
    }

}
