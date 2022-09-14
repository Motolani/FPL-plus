<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    //
    public function editDetailsView()
    {
        # code...
        return view('user.settings.userDetails');
    }
    
    public function editDetails(Request $request)
    {
        # code...
        
        Log::info($request);
        
        $user = User::where("id", Auth::id());
        
        if($request->user_name){
            $user->update([
                "name" => $request->user_name
            ]);
        };
        
        if($request->phone_number){
            $user->update([
                "phonenumber" => $request->phone_number
            ]);
        };
        
        if($request->fpl_id){
            $user->update([
                "fpl_id" => $request->fpl_id
            ]);
        };
        
        return redirect('/profile')->with('message', 'Details updated successfully');
    }
    
    public function updatePwdView()
    {
        # code...
        
        return view('user.settings.changePwd');
    }
    
    public function updatePwd(Request $request)
    {
        # code...
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'new_password_confirmation' => 'required|same:new_password',
            'old_password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
            // return redirect()->back()->with('error', "validation error");
            
        }
        
        $user = User::where("id", Auth::id());
        
        Log::info(Auth::user()->password);
        $hashCheck = Hash::check($request->old_password, $user->password);
        Log::info($hashCheck);
        
        $hashed = Hash::make($request->new_password);
        if($hashCheck){
            $user->update([
                "pin" => $hashed,            
            ]);
            
            return redirect('/profile')->with('message', "Password successfully changed");
        }else{
            return redirect()->back()->with('error', "Incorrect Old Password");
        }
        
    }
    
}
