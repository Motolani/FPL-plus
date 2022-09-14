<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
{
    //
    public function airtclesPage()
    {
        # code...
        $hash = Hash::make('123456789');
        Log::info($hash);
        $topMenu = Post::where("type_id", 1)->where("published", 1)->inRandomOrder()->limit(6)->get();
        // dd($topMenu);
        // $leftPosts = Post::where("side", "left")->where("type_id", 1)->latest()->paginate(2);
        $leftPosts = Post::where("side", "left")->where("type_id", 1)->where("published", 1)->latest()->paginate(2);
        $rightPosts = Post::where("side", "right")->where("type_id", 1)->where("published", 1)->latest()->paginate(2);
        // $rightPosts = Post::where("side", "right")->where("type_id", 1)->latest()->paginate(2);
        
        // Log::info($leftPosts);
        return view('articles', compact('leftPosts', 'rightPosts', 'topMenu'));
    }
    
    public function show($id)
    {
        # code...
        $post = Post::where('id',$id)->first();
        
        // $content = str_replace('"', "", $post->content);
        $content = $post->content;
        Log::info("here_id");
        Log::info($content);

        $userId = Auth::id(); 

        // Log::info("user_id" . $userId);
        $author = Author::where("id", $post->author_id)->first();
        
        $tags = $post->tags;
        
        $previ_url = url();
        
        return view("postDisplay", compact("post","author", "content", "tags", "previ_url"));
    }
    
    public function articleDisplay($id)
    {
        # code...
        $post = Post::where('id',$id)->first();
        
        // $content = str_replace('"', "", $post->content);
        $content = $post->content;
        Log::info("here");
        Log::info($content);

        $userId = Auth::id(); 

        // Log::info("user_id" . $userId);
        $author = Author::where("id", $post->author_id)->first();
        
        $tags = $post->tags;
        
        $previ_url = url();
        
        return view("articleDisplay", compact("post","author", "content", "tags", "previ_url"));
    }
}
