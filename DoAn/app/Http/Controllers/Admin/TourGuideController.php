<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TourGuideController extends Controller
{

    private TourGuide $tourGuide;
    public function __construct() {
        $this->tourGuide = new TourGuide();
    }

    public function index(){
        return view('admin.tour_guide.tour_guide',[
            'title' => 'Hướng dẫn viên',
            'active' => 5,
            'tourGuide' => $this->getAllTourGuide(),
        ]);
    }

    public function getAllTourGuide(){
        return $this->tourGuide::orderBy('id', 'desc')->get();
    }

    public function addPage(){
        return view('admin.tour_guide.add',[
            'title' => 'Thêm hướng dẫn viên',
            'active' => 5,
        ]);
    }

    public function addTourGuide(Request $request){
        $get_image = $request->file('image');
        if(!is_null($get_image)){
            $new_image = 'tour_guide_'.md5(Str::random(10).rand(0,999999).now()->milli).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('picture/tour_guide',$new_image);
            $this->tourGuide->name = $request->input('name');
            $this->tourGuide->email = $request->input('email');
            $this->tourGuide->phone = $request->input('phone');
            $this->tourGuide->birthday = $request->date('birthday');
            $this->tourGuide->address = $request->input('address');
            $this->tourGuide->language_job = $request->input('language_job');
            $this->tourGuide->avatar_image = $new_image;
            $this->tourGuide->save();
            return redirect('/admin/tour_guide')->with('success','Tạo mới thành công');
        }

        return redirect('/admin/tour_guide')->with('error','Lỗi tạo mới');
    
    }

    public function deleteTourGuide(Request $request){
        $tourGuide = $this->tourGuide::find($request->input('id'));
        if(!is_null($tourGuide)){
            $image = public_path('picture/tour_guide/'.$tourGuide->avatar_image);
            File::delete($image);
            $tourGuide->delete();
            return response() ->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response() ->json([
            'error' => true,
        ]);
    }

    public function updatePage(TourGuide $tourGuide){
        return view('admin.tour_guide.update',[
            'title' => 'Cập nhật hướng dẫn viên',
            'active' => 5,
            'tourGuide' => $tourGuide,
        ]);
    }

    public function updateTourGuide(TourGuide $tourGuide, Request $request){
        $get_image = $request->file('image');
        $this->tourGuide=$tourGuide;
        $this->tourGuide->name = $request->input('name');
        $this->tourGuide->email = $request->input('email');
        $this->tourGuide->phone = $request->input('phone');
        $this->tourGuide->birthday = $request->date('birthday');
        $this->tourGuide->address = $request->input('address');
        $this->tourGuide->language_job = $request->input('language_job');
        $this->tourGuide->save();

        if(!is_null($get_image)){
            $image = public_path('picture/tour_guide/'.$this->tourGuide->avatar_image);
            File::delete($image);
            $new_image = 'tour_guide_'.md5(Str::random(10).rand(0,999999).now()->milli).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('picture/tour_guide',$new_image);
            $this->tourGuide->avatar_image = $new_image;
            $this->tourGuide->save();
        }
        return redirect('/admin/tour_guide')->with('success','Cập nhật thành công');
    }
}
