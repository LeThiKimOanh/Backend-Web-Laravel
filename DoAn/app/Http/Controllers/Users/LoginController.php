<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class LoginController extends Controller
{
    public function __construct() {
        
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = md5($request->input('password'));

        $user = User::where('email',$email)
        ->where('password',$password)
        ->where('role',0)
        ->first();

        if(is_null($user)){
            return redirect() -> back() -> with('error','Sai email hoặc mật khẩu');
        }

        $request -> session()-> put('user',$user);
        
        return redirect('/');
    }

    public function logout(){
        
        session()->flush();
        return redirect('/');
        
    }

    public function registration(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $birthday = $request->date('birthday');
        $avatar = $request->file('avatar');
        $password = $request->input('password');
        $comfirmPassword = $request->input('confirmPassword');

        if($password != $comfirmPassword){
            return redirect()->back();
        }

        $new_image = 'avatar'.md5(Str::random(10).rand(0,999999).now()->milli).'.'.$avatar->getClientOriginalExtension();
        $avatar->move('picture/user',$new_image);

        $user = new User();
        $user->name = $name;
        $user->birthday = $birthday;
        $user->email = $email;
        $user->phone = $phone;
        $user->password = md5($password);
        $user->avatar_image = $new_image;
        $user->save();

        return redirect('/login')->with('success','Tạo tài khoản thành công');;


    }
}
