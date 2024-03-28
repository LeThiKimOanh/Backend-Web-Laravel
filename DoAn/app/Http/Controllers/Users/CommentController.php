<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    private Comment $comment;
    public function __construct() {
        $this->comment = new Comment();
    }

    public function comment(Request $request){
        $tour_id = $request->input('id');
        $user_id = session()->get('user')->id;
        $text = $request->input('text');

        $this->comment->comment_text = $text;
        $this->comment->user_id = $user_id;
        $this->comment->tour_id = $tour_id;
        $this->comment->save();

        return response() ->json([
            'success' => true,
        ]);
        // $promotion = ::orderBy('id', 'desc')->where('view_control',1)->get();
        // $tours = Tour::whereNotIn('id', [$tour->id])->get();
        // return view('users.tour.tour_detail',[
        //     'title' => 'Thông tin tour',
        //     'active' => 2,
        //     'tour' => $tour,
        //     'tours' => $tours,
        //     'promotion' => $promotion,
        //     'comment' => $comment
        // ]);
    }

}
