<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourCategoryController extends Controller
{

    private TourCategory $tourCategory;
    public function __construct() {
        $this->tourCategory = new TourCategory();
    }
    public function index(){
        return view('admin.tour_category.tour_category',[
            'title' => 'Danh mục tour',
            'active' => '3',
            'childActive' => 2,
            'tourCategory' => $this->getAllTourCategory(),
        ]);
    }

    public function getAllTourCategory(){
        return $this->tourCategory::orderBy('id', 'desc')->get();
    }

    public function addPage(){
        return view('admin.tour_category.add',[
            'title' => 'Thêm danh mục tour',
            'childActive' => 2,
            'active' =>3,
        ]);
    }

    public function addTourCategory(Request $request){
        $this->tourCategory->name = $request->input('name');
        $this->tourCategory->save();
        return redirect('/admin/tour_category')->with('success','Thêm danh mục thành công');
    }

    public function updatePage(TourCategory $tourCategory){
        return view('admin.tour_category.update',[
            'title' => 'Cập nhật danh mục tour',
            'tourCategory' => $tourCategory,
            'childActive' => 2,
            'active' =>3
        ]);
    }

    public function updateTourCategory(TourCategory $tourCategory, Request $request){
        $this->tourCategory = $tourCategory;
        $this->tourCategory->name = $request->input('name');
        $this->tourCategory->save();
        return redirect('/admin/tour_category')->with('success','Cập nhật danh mục thành công');
    }

    public function deleteTourCategory(Request $request){
        $tourCategory = $this->tourCategory::find($request->input('id'));
        if(!is_null($tourCategory)){
            $tourCategory->delete();
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
