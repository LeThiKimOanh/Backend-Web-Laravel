<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PromotionController extends Controller
{
    private Promotion $promotion;

    public function __construct() {
        $this->promotion = new Promotion();
    }

    public function index(){
        return view('admin.promotion.promotion',[
            'title' => 'Giảm giá',
            'active' => 3,
            'childActive' => 3,
            'promotion' => $this->getAllPromotion(),
        ]);
    }

    public function getAllPromotion(){
        return $this->promotion::orderBy('id', 'desc')->get();
    }

    public function addPage(){
        return view('admin.promotion.add',[
            'title' => 'Thêm giảm giá',
            'active' => 3,
            'childActive' => 3,
        ]);
    }

    public function addPromotion(Request $request){
        $get_image = $request->file('image');
        if(!is_null($get_image)){
            $new_image = 'poster_'.md5(Str::random(10).rand(0,999999).now()->milli).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('picture/poster_promotion',$new_image);
            $this->promotion->name = $request->input('name');
            $this->promotion->discount =(double)$request->input('discount');
            $this->promotion->start_date = $request->date('start_date');
            $this->promotion->end_date = $request->date('end_date');
            $this->promotion->poster_image = $new_image;
            $this->promotion->save();
            return redirect('/admin/promotion')->with('success','Tạo giảm giá thành công');
        }

        return redirect('/admin/promotion')->with('error','Lỗi tạo mới');
    
    }

    public function updatePage(Promotion $promotion){
        return view('admin.promotion.update',[
            'title' => 'Cập nhật giảm giá',
            'active' => 3,
            'childActive' => 3,
            'promotion' => $promotion
        ]);
    }

    public function updatePromotion(Promotion $promotion, Request $request){
        $get_image = $request->file('image');
        $this->promotion=$promotion;
        $this->promotion->name = $request->input('name');
        $this->promotion->discount =(double)$request->input('discount');
        $this->promotion->start_date = $request->date('start_date');
        $this->promotion->end_date = $request->date('end_date');
        $this->promotion->save();

        if(!is_null($get_image)){
            $image = public_path('picture/poster_promotion/'.$this->promotion->poster_image);
            File::delete($image);
            $new_image = 'poster_'.md5(Str::random(10).rand(0,999999).now()->milli).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('picture/poster_promotion',$new_image);
            $this->promotion->poster_image = $new_image;
            $this->promotion->save();
        }
        return redirect('/admin/promotion')->with('success','Tạo giảm giá thành công');
    }

    public function deletePromotion(Request $request){
        $promotion = $this->promotion::find($request->input('id'));
        if(!is_null($promotion)){
            $image = public_path('picture/poster_promotion/'.$promotion->poster_image);
            File::delete($image);
            $promotion->delete();
            return response() ->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response() ->json([
            'error' => true,
        ]);
    }

    public function view(Request $request){

        $id = $request->input('id');
        $promotion = $this->promotion::find($id);
        $check = $request->input('check');
        if($check==1){ 
            $promotion->view_control = 1;
            $promotion->save();
        }else{
            $promotion->view_control = 0;
            $promotion->save();
        }
        
    }

}