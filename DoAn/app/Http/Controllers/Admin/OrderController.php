<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private Order $order;
    public function __construct() {
        $this->order = new Order();
    }

    public function index(){
        return view('admin.order.order',[
            'title' => 'Tất cả',
            'active' => 6,
            'childActive' => 1,
            'order' => $this->getAllOrder(),
        ]);
        
    }

    public function getAllOrder(){
        return $this->order::orderBy('id', 'desc')->get();
    }

    public function changeAction(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        $order = $this->order::find($id);
        $order->type_confim_id = $status;
        $order->save();
        $request -> session()-> put('warning',Order::where('type_confim_id', 1)->count());
        $request ->session()-> put('newOrder',Order::whereIn('type_confim_id',[2,3])->count());
    }

    public function booked(){
        return view('admin.order.order',[
            'title' => 'Tour đã đặt',
            'active' => 6,
            'childActive' => 2,
            'order' => $this->getTourBooked(),
        ]);
    }

    public function getTourBooked(){
        return $this->order::whereIn('type_confim_id',[2,3])->orderBy('id', 'desc')->get();
    }

    public function watingConfimation(){
        return view('admin.order.order',[
            'title' => 'Tour chờ xác nhận',
            'active' => 6,
            'childActive' => 3,
            'order' => $this->getTourWatingConfimation(),
        ]);
        
    }
    public function getTourWatingConfimation(){
        return $this->order::where('type_confim_id', 1)->orderBy('id', 'desc')->get();
    }

    public function countTourWatingConfimation(){
        return $this->order::where('type_confim_id', 1)->count();
    }


}
