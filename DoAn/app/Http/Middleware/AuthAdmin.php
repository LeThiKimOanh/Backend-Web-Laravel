<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request -> validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Bắt buộc!',
            'password.required' => 'Bắt buộc!',
        ]);

        $data_user = $request->only('username','password','role');

        // dd($data_user);

        $admin = User::where('username', $data_user['username'])
        ->where('password',  $data_user['password']) 
        ->where('role',  $data_user['role']) 
        ->first();

        if(is_null($admin)){
            $error = 'Sai tên đăng nhập hoặc mật khẩu';
            return redirect() -> back() -> with('error', $error);
        }

        $request -> session()-> put('admin',$admin);
        return redirect() -> route('admin.home');
    }

}
