<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Api
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
        $apiKey = request()->header('apiKey');
        
        $tokenRow = DB::table('tokens')->where("name", "api_key");
        if($tokenRow->exists()){
            if($tokenRow->token_key == $apiKey){
                return $next($request);
            }else{
                return redirect()->back()->with("error", "Failed");
            }
        }else{
            return redirect()->back()->with("error", "Failed");
        }
    }
}
