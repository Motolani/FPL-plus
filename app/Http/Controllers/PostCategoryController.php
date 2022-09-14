<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = PostCategory::all();
        return view('admin.posts.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.createCategory');
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
        Log::info("store category");
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'about' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "validation error");
        }
        
        $postCat = new PostCategory();
        $postCat->name = $request->name;
        $postCat->about = $request->about;
        $postCat->save();
        
        return redirect('admin/post/category')->with("message", "Category successfully Created");
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
        $postCat = PostCategory::find($id);
        
        return view('admin.posts.editCategories', compact('postCat'));
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
        $cat = PostCategory::where("id", $id)->update([
            "name" => $request->name,
            "about" => $request->about,
        ]);
        
        return redirect('admin/post/category')->with('message', "updated Successfully");
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
