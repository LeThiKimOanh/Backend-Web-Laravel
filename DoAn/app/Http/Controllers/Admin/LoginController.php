<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index(){
        return view('admin.login',[
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function login(Request $request){

        $request -> validate([
            'email' => 'required|max:255|email',
            'password' => 'required|max:255|min:8'
        ],[
            'email.required' => 'Bắt buộc!',
            'email.max' => 'Email tối đa 255 kí tự',
            'email.email' => 'Sai định dạng email',
            'password.required' => 'Bắt buộc!',
            'password.max' => 'Mật khẩu tối đa 255 kí tự',
            'password.min' => 'Mật khẩu tối thiểu 8 kí tự'
        ]);

        $password = md5($request->input('password'));
        $admin = User::where('email', $request->input('email'))
        ->where('password', $password)
        ->where('role',1)
        ->first();

        if(is_null($admin)){
            return redirect() -> back() -> with('error','Sai email hoặc mật khẩu!');
        }

        $request -> session()-> put('admin',$admin);
        $request -> session()-> put('warning',Order::where('type_confim_id', 1)->count());
        $request -> session()-> put('newOrder',Order::whereIn('type_confim_id',[2,3])->count());
        
        return redirect('admin/');
    }

    public function logout(){
        session()->flush();
        return redirect('admin/login');
    }
}
