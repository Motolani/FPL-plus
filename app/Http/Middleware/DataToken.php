<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DataToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $thisUser = Auth::user();
        $user = User::where("id", $thisUser->id);
        
        $dataCheck = $user->dataToken;
        
        $ip = $request->ip();
        
        // $dataToken = request()->header('data_token');
        $dataToken = "justTest";
        Log::info("user " .$user->id." Ip");
        Log::info($ip);
        $user->update([
            "last_ip" => $ip,
        ]); 
        
        $check = Hash::check($dataToken, $user->dataToken);
        if($check){
            return $next($request);
        }else{
            Log::info($ip. "- Invalid Request");
            return redirect()->back()->with('error','invalid request');
        }
    }
}
