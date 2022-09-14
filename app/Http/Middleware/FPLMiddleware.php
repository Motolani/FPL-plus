<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LivecoreInteractive\FplApi\FplApi;

class FPLMiddleware
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
        # code...
        $url = "https://users.premierleague.com/accounts/login/";
        $pwd = $request->password;
        $email = $request->email;
        $redirect = 'https://fantasy.premierleague.com/a/login';
        
        $data = array(
            "password" => $pwd,
            "login" => $email,
            "redirect_uri" => $redirect,
            "app" => "plfpl-web",
        );
        
        $cookie_jar = tempnam('/tmp','coo'); 
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://users.premierleague.com/accounts/login/',
            CURLOPT_COOKIEJAR => $cookie_jar,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Cookie: datadome=.GKwiWW-j~0UIXw5iJY6ZGqz35MtjlwbOPtS9ilmx781yre~VLA~ryf2YjhUh.vBsY.jwVuCijwP4aseKWMHu6J8txlVJpy9dlK8S5E.5b1L3fxXO.f6CzRYZrI.yNZ4'
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        // echo $response;
        
        Log::info($response);
        Log::info($cookie_jar);

        
        return $next($request)->with("cookie_jar");
    }
}
 