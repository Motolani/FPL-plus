<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Log::info(Auth::id());
        Log::info(Auth::guard('admin')->user()->id);
        return view('admin/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    // public function adminId(Request $request)
    // {
    //     # code...
    //     Admin::join('users', 'users.id','admins.user_id')->where('admins.user_id',)
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    
    public function loginView()
    {
        # code...
        return view("admin.auth.login");
    }
    
    public function adminLogin(Request $request)
    {
        # code...
        Log::info($request);
        
        $user = Admin::where("email", $request->email);
        
        if($user->exists()){
            $adminUser = $user->first();
            $check = Hash::check($request->password, $adminUser->password);
            if($check){
                $data = Hash::make($adminUser->email);
                $token = time().mt_rand();
                $dataToken = $data . $token;
                $user->update([
                    "dataToken" => $dataToken,
                    "last_login" => Carbon::now(),
                ]);
                return redirect('admin/dashboard')->with('error', 'Invalid Mail');
            }
        }else{
        
            return redirect()->back()->with('error', 'Invalid Mail');
        }
    }

}
