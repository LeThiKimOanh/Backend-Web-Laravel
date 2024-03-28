<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{

    private Slider $slider;

    public function __construct() {
        $this->slider = new Slider();
    }
    public function index(){
        return view('admin.slider.slider',[
            'title' => 'Slider',
            'active' => 2,
            'slider' => $this -> getAllSlider(),
        ]);
    }

    public function addPage(){
        return view('admin.slider.add',[
            'title' => 'Thêm Slider',
        ]);
    }

    public function updatePage(Slider $slider){
        return view('admin.slider.update',[
            'title' => 'Cập nhật slide',
            'slider' => $slider
        ]);
    }

    public function getAllSlider(){
        return $this->slider::orderBy('id', 'desc')->get();
    }

    public function addSlider(Request $request){
        $admin = session()->get('admin');

        $get_image = $request->file('image');
        if(!is_null($get_image)){
            // $get_name_image = $get_image->getClientOriginalName();
            // $name_image = current(explode('.',$get_name_image));
            $new_image = 'slider_'.md5(Str::random(10).rand(0,999999).now()->milli).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('picture/slider',$new_image);
            $this->slider->name = $request->input('name');
            $this->slider->status = $request->input('status');
            $this->slider->image = $new_image;
            $this->slider->user_id = $admin->id;
            $this->slider->save();
            return redirect('/admin/slider')->with('success','Tạo mới slider thành công');
        }

        return redirect()->back()->with('error','Lỗi thêm mới');
    }

    public function deleteSlider(Request $request){

        $slider = $this->slider::find($request->input('id'));
        if(!is_null($slider)){
            $image = public_path('picture/slider/'.$slider->image);
            File::delete($image);
            $slider->delete();
            return response() ->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response() ->json([
            'error' => true,
        ]);
        
    }

    public function updateSlider(Slider $slider, Request $request){
        $this->slider = $slider;
        $get_image = $request->file('image');
        $this->slider->name = $request->input('name');
        $this->slider->status = $request->input('status');
        $this->slider->save();
        if(!is_null($get_image)){
            $image = public_path('picture/slider/'.$this->slider->image);
            File::delete($image);
            $new_image = 'slider_'.md5(Str::random(10).rand(0,999999).now()->milli).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('picture/slider',$new_image);
            $this->slider->image = $new_image;
            $this->slider->save();
            return redirect('/admin/slider') -> with('success',"Cập nhật thành công");
        }

    }


    public function controllSlider(){ 
        return view('admin.slider.controll',[
            'title' => 'Setup slider',
            'active' => 2,
            'slider' => $this -> getAllSlider(),
        ]);
    }

    public function view(Request $request){
        $id = $request->input('id');
        $slider = $this->slider::find($id);
        $check = $request->input('check');
        if($check==1){ 
            $slider->view_control = 1;
            $slider->save();
        }else{
            $slider->view_control = 0;
            $slider->save();
        }
        
    }

}
