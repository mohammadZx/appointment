<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::orderBy('id', 'DESC')->paginate(PREPAGE);
        return view('admin.comment.index', [
            'comments' => $comments
        ]);
    }

    public function edit(Comment $comment){
    
    }

    public function update(Request $request, Comment $comment){
        $request->validate([
            'comment' => 'required|max:500',
            'rating' => 'required|min:1|max:5'
        ]);
        $comment->content = $request->comment;
        $comment->rate = $request->rating;
        $comment->save();

        return redirect()->back()->with('message' , [
            'type' => 'success',
            'message' => __('app.Item successfully updated')
        ]);

    }

    public function destroy(Comment $comment){
        $comment->delete();

        return redirect()->back()->with('message' , [
            'type' => 'success',
            'message' => __('app.Item successfully deleted')
        ]);

    }

    public function changeStatus(Comment $comment){
        $comment->status = !$comment->status;
        $comment->save();
        return redirect()->back()->with('message' , [
            'type' => 'success',
            'message' => __('app.Item successfully updated')
        ]);
    }
}
