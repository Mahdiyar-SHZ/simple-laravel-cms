<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function StoreComment(Request $request , $blogId){
        $request->validate([
            'comment' => 'required|string|min:3'
        ]); 

        Comment::create([
            'user_id' => auth()->id(),
            'blog_post_id' => $blogId,
            'comment' => $request->comment
        ]);

        $notification = array(
            'message' => 'Sent Comment!',
            'alert-type' => 'succuss'
        );
        return back()->with($notification);
    }
}
