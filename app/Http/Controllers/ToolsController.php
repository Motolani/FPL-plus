<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ToolsController extends Controller
{
    //
    public function generallData()
    {
        # code...
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1:8001/api/fpl/generalData',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        Log::info($response);
        
        $dec = json_decode($response);
        
        return view("events", compact("dec"));
    }
    
    public function fixtures()
    {
        # code...
        $teams = Team::all();
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://fantasy.premierleague.com/api/fixtures/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        Log::info($response);
        
        curl_close($curl);
        // dd($response);
        $dec = json_decode($response);
        // dd($dec);
        if(isset($dec)){
            $count = count($dec);
            Log::info($count);
            
        //     foreach($dec as $res){
        // // dd($res);
        // // dd(Carbon::parse($res->kickoff_time));
        //         Fixture::truncate();
        //         $fixture = new Fixture();
        //         $fixture->id = $res->id;
        //         $fixture->event = $res->event;
        //         $fixture->finished = $res->finished;
        //         $fixture->kickoff_time = Carbon::parse($res->kickoff_time);
        //         $fixture->minutes = $res->minutes;
        //         $fixture->provisional_start_time = $res->provisional_start_time;
        //         $fixture->started = $res->started;
        //         $fixture->team_a_id = $res->team_a;
        //         $fixture->team_a_score = $res->team_a_score;
        //         $fixture->team_h_id = $res->team_h;
        //         $fixture->team_h_score = $res->team_h_score;
        //         // $fixture->stats = $res->stats;
        //         $fixture->team_h_difficulty = $res->team_h_difficulty;
        //         $fixture->team_a_difficulty = $res->team_a_difficulty;
        //         $fixture->code = $res->code;
        //         $fixture->finished_provisional = $res->finished_provisional;
        //         $fixture->pulse_id = $res->pulse_id;
        //         $fixture->save();
        //     }
        }
        
        
        for($x = 0; $x <= 35; $x++){
            $gw[$x] = Team::join('fixtures', 'fixtures.team_h_id', 'teams.id')
                // ->join('fixtures', 'fixtures.team_a_id', 'teams.id')
                ->where('event', $x)
                ->select('fixtures.*', 'teams.id as team_id', 'teams.team', 'teams.img')
                ->get();
        }
        
        dd($gw[1]);
        // return view('tools.events', compact('teams', 'dec'));
        return view('tools.events', compact('teams', 'gw[1]', 'gw[2]', 'gw[3]', 'gw[4]', 'gw[5]'));
        
    }
}
