<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TeamReviewsController extends Controller
{
    //
    public function reviewsPage()
    {
        # code...

        
        $topMenu = Post::where("type_id", 2)->where("published", 1)->inRandomOrder()->limit(6)->get();
        $leftPosts = Post::where("side", "left")->where("type_id", 2)->where("published", 1)->latest()->paginate(2);
        // $rightPosts = Post::where("side", "right")->where("published", 1)->latest()->paginate(5);
        $rightPosts = Post::where("side", "right")->where("type_id", 2)->where("published", 1)->latest()->paginate(2);
        
        // Log::info($leftPosts);
        return view('review', compact('leftPosts', 'rightPosts', 'topMenu'));
    }
    
    public function show($id)
    {
        # code...
        $post = Post::where('id',$id)->first();
        
        // $content = str_replace('"', "", $post->content);
        $content = $post->content;
        Log::info($content);

        $userId = Auth::id(); 

        // Log::info("user_id" . $userId);
        $author = Author::where("id", $post->author_id)->first();
        
        $tags = $post->tags;
        
        $previ_url = url();
        
        return view("postDisplay", compact("post","author", "content", "tags", "previ_url"));
    }
    
    public function teamReviewsDisplay($id)
    {
        # code...
        $post = Post::where('id',$id)->first();
        
        // $content = str_replace('"', "", $post->content);
        $content = $post->content;
        Log::info($content);

        $userId = Auth::id(); 

        // Log::info("user_id" . $userId);
        $author = Author::where("id", $post->author_id)->first();
        
        $tags = $post->tags;
        
        $previ_url = url();
        
        return view("articleDisplay", compact("post","author", "content", "tags", "previ_url"));
    }
}
