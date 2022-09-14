<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'body' => 'required',            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "validation error");
        }
        
        $comment = new Comment();
        $comment->body = $request->body;
        // $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);
        if($request->parent_id){
            $comment->parent_id = $request->parent_id;
        }
        $comment->save();
        if($request->parent_id){
            return redirect($request->prev_url);
        }else{
            return redirect()->back();  
        }
    }
    
    public function commentReplyForm($post_id, $comment_id)
    {
        # code...
        Log::info("comment reply");
        $post = Post::find($post_id);
        $comment = Comment::find($comment_id);
        
        Log::info($post_id);
        Log::info($post);
        Log::info($comment_id);
        Log::info($comment);
        
        $prevUrl = url()->previous();
        Log::info($prevUrl);
        
        
        return view('commentReply', compact("post","comment","prevUrl"));
    }
}
