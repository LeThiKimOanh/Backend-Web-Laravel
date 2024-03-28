<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){   
        $order = Order::whereIn('type_confim_id',[3])->get();
        $doanhThu = 0;
        foreach($order as $item){
            $doanhThu += $item->total;
        }
        session()->put('doanhThu',$doanhThu) ;
        session()-> put('newOrder',Order::whereIn('type_confim_id',[2,3])->count());
        session()-> put('newCreater',User::count());
        return view('admin.index',[
            'title' => 'Dashboard',
            'active' =>1,
            'week' => $this->getWeekDays(),
        ]);
    }

    public function getWeekDays(){
    $startOfWeek = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek(); // Lấy ngày bắt đầu của tuần

    $weekDays = [];

    for ($i = 0; $i < 7; $i++) {
        $weekDays[] = $startOfWeek->copy()->addDays($i)->toDateString();
    }

    return $weekDays;
   }

    public function statistics(Request $request){

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $sub7date = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365date = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        if($request->has('value')){
        if($request->input('value')==1){
            $get = Order::whereBetween('date',[$sub7date,$now])->orderBy('date','asc')->get();
        }elseif($request->input('value')==2){
            $get = Order::whereBetween('date',[$dauthangnay,$now])->orderBy('date','asc')->get();
        }elseif($request->input('value')==3){
            $get = Order::whereBetween('date',[$sub365date,$now])->orderBy('date','asc')->get();
        }
    }else{
        $get = Order::whereBetween('date',[$sub7date,$now])->orderBy('date','asc')->get();
    }
        
        return view('admin.statistics.statistics',[
            'title' => 'Thống kê',
            'active' =>1,
            'list_booked' => $get,
        ]);
    }

    public function comment(){
        $comment = Comment::orderBy('id','desc')->get();
        return view('admin.comment.comment',[
            'title' => 'Bình luận',
            'active' =>8,
            'comment' => $comment
        ]);
    }

    public function deleteComment(Request $request){
        $id = $request->input('id');
        $comment = Comment::find($id);
        $comment->delete();
        return response() ->json([
            'error' => false,
            'message' => 'Xóa thành công'
        ]);
    }
}
