<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminAuth
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
        $adminUser = Admin::where("id", $request->id)->first();
        // $check = Hash::check($request->token, $adminUser->dataToken);
        
        if($request->token ===  $adminUser->dataToken){
            return $next($request);
            
        }else{
            Log::info("invalid Admin");
            return redirect()->back()->with("error", "Failed!");
        }
    }
}
