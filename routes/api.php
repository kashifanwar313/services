<?php

use App\Http\Controllers\Api\NuofcarController;
use App\Http\Controllers\Api\DrivewayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StoryController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\SquareFootController;
use App\Http\Controllers\Api\QuoteController;

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

Route::get('/services', [ServicesController::class, 'services']);
Route::get('/stories', [StoryController::class, 'stories']);
Route::get('/square-foots', [SquareFootController::class, 'squareFoots']);
Route::get('/driveway', [DrivewayController::class, 'driveway']);
Route::get('/nu-of-cars', [NuofcarController::class, 'nu_of_cars']);
Route::post('/create_quote', [QuoteController::class, 'create_quote']);
Route::post('/update_quote', [QuoteController::class, 'update_quote']);
Route::get('/get_quote', [QuoteController::class, 'get_quote']);
