<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class ReviewController extends Controller
{
    //
    public function reviewsPage()
    {
        # code...    
        
        return View::make('review');
    }
}
