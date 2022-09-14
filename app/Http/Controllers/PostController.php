<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::join("authors", "authors.id","posts.author_id")
            ->join("post_type","post_type.id","posts.type_id")
            ->select("posts.*","authors.name as author","post_type.name as type")->get();
            
            // dd($posts);
        return view('admin.posts.index', compact('posts'));
    }
    
    public function posts()
    {
        //
        $posts = Post::join("authors", "authors.id","posts.author_id")
            ->join("post_type","post_type.id","posts.type_id")
            ->where("posts.published", 1)
            ->select("posts.*","authors.name as author","post_type.name as type")->get();
            
            // dd($posts);
        return view('admin.posts.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userId = Auth::id();
        
        $postCat = PostCategory::all();
        return view('admin.posts.create', compact('postCat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    
    public function store(Request $request)
    {
        //
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'post_type' => 'required|exists:post_type,id',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'menu_title' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'content' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "validation error");
        }
        
        $filenamewithextension = $request->file('file')->getClientOriginalName();
        Log::info("Filenamewwithextension: " .$filenamewithextension);
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        Log::info("filename: " .$filename);
        
        //get file extension
        $extension = $request->file('file')->getClientOriginalExtension();
        Log::info("extension: " .$extension);
        
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
        Log::info("filenametostore: " .$filenametostore);

        //Upload File
        $request->file('file')->move('public/uploads', $filenametostore);

        // $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        // Log::info("CKEditorFuncNum: " .$CKEditorFuncNum);
        
        $url = asset('public/uploads/'.$filenametostore);
        Log::info("url: " .$url);
        
        // $message = 'File uploaded successfully';
        // $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";
                
        if($request->input('action') == "save") {
            Log::info("save post");

            $reference = time().mt_rand();
            if(Auth::id()){
                $userId = Auth::id(); 
            }else{
                $userId = Auth::guard('admin')->user()->user_id;
            }
            
            $prev = post::latest()->first();
            if(isset($prev->side)){
                $prevSide = $prev->side;
            }else{
                $prevSide = "right";
            }
            
            if($prevSide == "left"){
                $side = "right";
            }elseif($prevSide == "right"){
                $side = "left";
            }
            
            Log::info("user_id: " . $userId);
            $author = Author::where("user_id", $userId)->first();
            Log::info($author);
            Log::info($userId);
            
            $newPost = new Post();
            $newPost->author_id = $author->id;
            $newPost->admin_id = 1;
            $newPost->type_id = $request->post_type;
            $newPost->post_img = $filenametostore;
            $newPost->side = $side;
            $newPost->title = $request->title;
            $newPost->metaTitle = $request->menu_title;
            // $newPost->content = strip_tags($request->content);
            $newPost->content = $request->content;
            $newPost->reference = $reference;
            $saved = $newPost->save();
            
            if($saved){
                //once saved, redirect to edit page
                
                $post = Post::where("author_id", $author->id)->where("reference", $reference)->first();
                Log::info('admin/post/'. $post->id);
                
                return redirect('admin/post/'.$post->id.'/edit')->with('message', "saved successfully")->with('post', 'post');
            }else{
            Log::info("unchecked");
                
                return redirect()->back()->with('error', "Failed to Save Post");
                
            }
        }elseif($request->input('action') == "publish"){
            Log::info("Publish post");

            $reference = time().mt_rand();
            if(Auth::id()){
                $userId = Auth::id(); 
            }else{
                
                $userId = Auth::guard('admin')->user()->user_id;
            }
            
            $prev = post::latest()->first();
            if(isset($prev->side)){
                $prevSide = $prev->side;
            }else{
                $prevSide = "right";
            }
            
            if($prevSide == "left"){
                $side = "right";
            }elseif($prevSide == "right"){
                $side = "left";
            }
            
            Log::info("user_id" . $userId);
            $author = Author::where("user_id", $userId)->first();
            $newPost = new Post();
            $newPost->author_id = $author->id;
            // $newPost->author_id = 1;
            $newPost->admin_id = 1;
            $newPost->type_id = $request->post_type;
            $newPost->title = $request->title;
            $newPost->metaTitle = $request->menu_title;
            $newPost->post_img = $filenametostore;
            $newPost->side = $side;
            $newPost->content = $request->content;
            $newPost->published = 1;
            $newPost->published_at = now();
            $newPost->reference = $reference;
            $saved = $newPost->save();
            
            if($saved){
                //once saved, redirect to edit page
                
                $post = Post::where("author_id", $author->id)->where("reference", $reference)->first();
                Log::info('admin/post/'. $post->id);
                
                return redirect('admin/post/'.$post->id.'/edit')->with('message', "Post Successfully Published")->with('post', 'post');
            }else{
            Log::info("unchecked");
                
                return redirect()->back()->with('error', "Failed to Save Post");
                
            }
        }elseif($request->input('action') == "preview"){
            Log::info("Preview post");
            
            $reference = time().mt_rand();
            if(Auth::id()){
                $userId = Auth::id(); 
            }else{
                
                $userId = Auth::guard('admin')->user()->user_id;
            }
            
            $prev = post::latest()->first();
            if(isset($prev->side)){
                $prevSide = $prev->side;
            }else{
                $prevSide = "right";
            }
            
            if($prevSide == "left"){
                $side = "right";
            }elseif($prevSide == "right"){
                $side = "left";
            }
            
            Log::info("user_id" . $userId);
            $author = Author::where("user_id", $userId)->first();
            $newPost = new Post();
            // $newPost->author_id = $author->id;
            $newPost->author_id = 1;
            $newPost->admin_id = 1;
            $newPost->type_id = $request->post_type;
            $newPost->title = $request->title;
            $newPost->metaTitle = $request->menu_title;
            $newPost->post_img = $filenametostore;
            // $newPost->content = strip_tags($request->content);
            $newPost->side = $side;
            $newPost->content = $request->content;
            $newPost->reference = $reference;
            $saved = $newPost->save();
            
            if($saved){
                //once saved, redirect to edit page
                
                $post = Post::where("author_id", $author->id)->where("reference", $reference)->first();
            
            // dd($author);
            Log::info('admin/post/'. $post->id);
            
            // $content = str_replace('"', "", $post->content);
            $content = $post->content;
            Log::info($content);
            
            $tags = $post->tags;
            
            return view('admin/posts/preview', compact('post', 'content', 'author'));
            }else{
                Log::info("unchecked");
                return redirect()->back()->with('error', "Failed to Save Post, Cant preview");
            }
        }
        
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $postCat = PostCategory::all();
        Log::info($post->content);
        
        return view('admin/posts/edit', compact('post', 'postCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'post_type' => 'required|exists:post_type,id',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'menu_title' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'content' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "validation error");
        }
        
        if($request->upload){
            $filenamewithextension = $request->file('file')->getClientOriginalName();
            Log::info("Filenamewwithextension: " .$filenamewithextension);
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            Log::info("filename: " .$filename);
            
            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();
            Log::info("extension: " .$extension);
            
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            Log::info("filenametostore: " .$filenametostore);
    
            //Upload File
            $request->file('file')->move('public/uploads', $filenametostore);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            Log::info("CKEditorFuncNum: " .$CKEditorFuncNum);
            
            $url = asset('public/uploads/'.$filenametostore);
            Log::info("url: " .$url);
            
            $message = 'File uploaded successfully';
            $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";
        }

        if($request->input('action') == "save") {
            Log::info("save post");
            
            $reference = time().mt_rand();
            if(Auth::id()){
                $userId = Auth::id(); 
            }else{
                
                $userId = Auth::guard('admin')->user()->user_id;
            }
            
            Log::info("user_id: " . $userId);
            $author = Author::where("user_id", $userId)->first();
            Log::info($author);
            $postUpdate = Post::find($id);
            $postUpdate->update([
                "author_id" => $author->id,
                "admin_id" => 1,
                "type_id" => $request->post_type,
                "title" => $request->title,
                "metaTitle" => $request->menu_title,
                "content" => $request->content,
            ]);
            
            $post = Post::where("author_id", $author->id)->where("reference", $postUpdate->reference)->first();
            Log::info('admin/post/'. $post->id);
            
            return redirect()->back()->with('message', "saved successfully")->with('post', 'post');
            
        }elseif($request->input('action') == "publish"){
            Log::info("Publish post");

            $reference = time().mt_rand();
            if(Auth::id()){
                $userId = Auth::id(); 
            }else{
                
                $userId = Auth::guard('admin')->user()->user_id;
            }
            
            Log::info("user_id: " . $userId);
            $author = Author::where("user_id", $userId)->first();
            Log::info($author);
            $postUpdate = Post::find($id);
            $postUpdate->update([
                "author_id" => $author->id,
                "admin_id" => 1,
                "published" => 1,
                "published_at" => now(),
                "type_id" => $request->post_type,
                "title" => $request->title,
                "metaTitle" => $request->menu_title,
                "content" => $request->content,
            ]);
            
            $post = Post::where("author_id", $author->id)->where("reference", $postUpdate->reference)->first();
            Log::info('admin/post/'. $post->id);
            
            return redirect()->back()->with('message', "Published successfully")->with('post', 'post');
            
        }elseif($request->input('action') == "preview"){
            Log::info("Preview post update");

            $reference = time().mt_rand();
            if(Auth::id()){
                $userId = Auth::id(); 
            }else{
                
                $userId = Auth::guard('admin')->user()->user_id;
            }
            
            Log::info("user_id" . $userId);
            $author = Author::where("user_id", $userId)->first();
            Log::info($author);
            $postUpdate = Post::find($id);
            $postUpdate->update([
                "author_id" => $author->id,
                "admin_id" => 1,
                // "post_img" => $filenametostore,
                "type_id" => $request->post_type,
                "title" => $request->title,
                "metaTitle" => $request->menu_title,
                "content" => $request->content,
            ]);
            
            $post = Post::where("author_id", $author->id)->where("reference", $postUpdate->reference)->first();
            
            // dd($author);
            Log::info('admin/post/'. $post->id);
            
            // $content = str_replace('"', "", $post->content);
            $content = $post->content;

            Log::info($content);
            
            $tags = $post->tags;
            
            return view('admin/posts/preview', compact('post', 'content', 'author'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
