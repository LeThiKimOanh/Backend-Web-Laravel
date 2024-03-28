<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Slider;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class MainController extends Controller
{
    public function __construct() {
        
    }

    public function index(){
        $slider = Slider::orderBy('id', 'desc')->where('view_control',1)->get();
        $tourRecent = Tour::orderBy('id', 'desc')->take(4)->get();

        // $ToursWithMostOrders = Tour::select('tours.*', DB::raw('COUNT(orders.id) as order_count'))
        // ->leftJoin('orders', 'tours.id', '=', 'orders.tour_id')
        // ->groupBy('tours.id')
        // ->orderByDesc('order_count')
        // ->take(4)
        // ->get();
        
        // dd($ToursWithMostOrders);
        return view('users.index',[
            'title' => 'Home',
            'active' => 1,
            'slider' => $slider,
            'tourRecent' => $tourRecent,
        ]);
    }

    public function loginPage(){
        return view('users.log.login',[
            'title' => 'Đăng nhập',
        ]);
    }

    public function registrationPage(){
        return view('users.log.register',[
            'title' => 'Đăng ký',
        ]);
    }

    public function aboutUs(){
        return view('users.about_us',[
            'title' => 'Về chúng tôi',
            'active' => 5,
        ]);
    }

    public function contactUs(){
        return view('users.contact_us',[
            'title' => 'Liên hệ chúng tôi',
            'active' => 6,
        ]);
    }

    public function userProfile(){
        return view('users.profile.user_profile',[
            'title' => 'User Profile',
            'active_profile' => 1,
            'active' => 7,
        ]);
    }

    public function tourBooked(Request $request){

        // http://localhost:8000/tour_booked?
        // vnp_Amount=550000000
        // vnp_BankCode=NCB
        // vnp_BankTranNo=VNP14267034
        // vnp_CardType=ATM
        // vnp_OrderInfo=Thanh+to%C3%A1n+h%C3%B3a+%C4%91%C6%A1n+9
        // vnp_PayDate=20240102084400
        // vnp_ResponseCode=00
        // vnp_TmnCode=Q3R6U6R1
        // vnp_TransactionNo=14267034
        // vnp_TransactionStatus=00
        // vnp_TxnRef=ORDER+9
        // vnp_SecureHash=bf66774beb7dc7673965c7753d7ffde86d8c39cd7a008f68e6eef6cd21b3f07b4103665c2f8ac81a1f8ddd5d7dd057048f12a31f7faf3714c8ca31e6ab74eb13
        
        if($request->has('vnp_SecureHash')){
    
            $order = Order::where('id',$request->get('vnp_TxnRef'))->first();
            if($order->type_confim_id==1||$order->type_confim_id==2){
            $payment = new Payment();
            $payment->amount = $request->get('vnp_Amount');
            $payment->vnp_BankCode = $request->get('vnp_BankCode');
            $payment->vnp_BankTranNo = $request->get('vnp_BankTranNo');
            $payment->vnp_PayDate = $request->get('vnp_PayDate');
            $payment->vnp_TmnCode = $request->get('vnp_TmnCode');
            $payment->vnp_SecureHash = $request->get('vnp_SecureHash');
            $payment->status = 1;
            $payment->order_id = $request->get('vnp_TxnRef');
            $payment->save();

            $order->type_confim_id = 3;
            $order->save();
            FacadesSession::flash('success', 'Thanh toán thành công');
            }

        }

        $user = $request->session()->get('user');

        $listOrder = Order::orderBy('type_confim_id', 'asc')
        ->orderBy('order_at', 'desc')
        ->where('user_id', $user->id)->get();

        return view('users.profile.booking',[
            'title' => 'Tour đã đặt',
            'active_profile' => 2,
            'active' => 7,
            'listOrder' => $listOrder,
        ]);

    }

    public function changePassword(){
        return view('users.profile.change_password',[
            'title' => 'Đổi mật khẩu',
            'active_profile' => 3,
            'active' => 7,
        ]);
    }

    public function saveProfile(User $user,Request $request){
        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();
        session(['user' => $user]);
        return redirect()->back()->with('success','Cập nhật thành công');
    }
}
