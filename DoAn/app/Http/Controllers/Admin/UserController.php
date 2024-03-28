<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        
    }

    public function getProfile(User $user){
        $order = Order::where('user_id',$user->id)->get();
        return view('admin.users.profile',[
            'title' => 'User Profile',
            'active' => 9,
            'user' => $user,
            'order' => $order
        ]);
    }

    public function getRecentTour(User $user){
        
    }
}
