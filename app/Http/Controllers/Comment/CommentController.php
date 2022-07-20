<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'comment' => 'required|max:500',
            'rating' => 'required|min:1|max:5',
            'id' => 'required',
            'type' => 'required'
        ]);
        $user = auth()->user()->id;

        $comment = new Comment();

        $comment->user_id = $user;
        $comment->content = $request->comment;
        $comment->rate = $request->rating;
        $comment->commentable_id = $request->id;
        $comment->status = 0;
        if($request->type == 'listing'){
            $comment->commentable_type = 'App\Models\Listing';
        }

        $comment->save();

        return redirect()->back()->with('message' , [
            'type' => 'success',
            'message' => __('app.Your comment publish successfully and after aproving admins show to anyone')
        ]);
        
    }
    
}
