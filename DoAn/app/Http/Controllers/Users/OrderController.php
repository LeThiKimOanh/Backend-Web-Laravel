<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private Order $order;
    public function __construct() {
        $this->order = new Order();
    }

    public function booking(Request $request){

        $this->order->number_of_child = $request->input('number_child');
        $this->order->number_of_adult = $request->input('number_adult');
        $this->order->name_tourist = $request->input('name');
        $this->order->phone_tourist = $request->input('phone');
        $this->order->email_tourist = $request->input('email');
        $this->order->total = $request->input('total');
        $this->order->user_id = session()->get('user')->id;
        $this->order->tour_id = $request->input('tour_id');
        $this->order->save();

        $payment = new Payment();
        $payment->amount = $this->order->total;
        $payment->order_id = $this->order->id;

        return redirect('/tour_booked')->with('success','Đặt tour thành công');
    }

    public function orderCancer(Order $order){
        $this->order = $order;
        $this->order->type_confim_id = 4;
        $this->order->save();
        return response() ->json([
            'success' => true,
        ]);
    }
}
