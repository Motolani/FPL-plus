<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    //
    public function bootstrapData(Request $request)
    {
        # code...
        
        $url = 'https://fantasy.premierleague.com/api/bootstrap-static/';

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: datadome=Qy0J1I9tvCUFp3t3-A_~OlsivKJcGsFbLCqUuaHkMrnYtVWikQK5dTLtA.czkrjoF.DOhJTnzwL9TNt8CgtyH-J0Ln-mhaiEFGbqXyImPVtZiSOy9qKeN8um.8V9Pm; pl_profile=eyJzIjogIld6SXNNek13T1RJek56ZGQ6MW56ZHVSOmxORF9CVFJISExGY0V3OXVvaEV3SDhyVVRFMU44Ni1HcTMwbjQzczlBZzQiLCAidSI6IHsiaWQiOiAzMzA5MjM3NywgImZuIjogIlRvcCIsICJsbiI6ICJCb3kgXHVkODNlXHVkZGUyIiwgImZjIjogMX19; csrftoken=0gcrDV1u0ZeonV2zf7IorjTd4bPMaDlTyDsHnRP0fmaLV2PU6nscQ7QgtvKxAG3E; sessionid=.eJxVy8sKwjAQheF3yVrKZKaTSdy5FxSK65LmQsRSirEr8d1Nd7o8fOd_q9FvrzJuNT3He1RHRQQOSUQdfmny4ZGW3dc5r3O3S3c935rVYbic2vwPiq-lvTV7BPAcOQoIaugZGKfEYsSicSDGuWgYNElEskLZOhIOuXegA6jPF6wGMMc:1nzdxH:G2cTMZ4fsS4PAT8ouq83eypaKn8TICJl_GWwvNVm6nQ'
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        Log::info($response);
        // return $response;
        
        $dec = json_decode($response);
        
        // dd($dec->teams);
        foreach($dec->teams as $team){
            $dbTeam = new Team();
            $dbTeam->id = $team->id;
            $dbTeam->team = $team->name;
            $dbTeam->code = $team->code;
            $dbTeam->save();
        }

    }
}
