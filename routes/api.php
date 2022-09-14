<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\FPLController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('postImgUpload', [FPLController::class, 'postImgUpload']);

Route::group(['prefix' => 'fpl'],function() {
    Route::post('/auth', [FPLController::class, 'auth']);
    Route::post('/generalData', [ApiController::class, 'bootstrapData']);
});

