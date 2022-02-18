<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\NuofcarController;
use App\Http\Controllers\Admin\DrivewayController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\PriceSheetController;
use App\Http\Controllers\Admin\SquareFootController;
use App\Http\Controllers\Admin\DrivewayPriceSheetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function(){
        return view('dashboard.index');
    })->name('dashboard.index');
    Route::get('/update-profile',function() {
        return view('dashboard.profile.index');
    })->name('profile.show');
    Route::resource('services', ServicesController::class)->names('services');
    Route::resource('square-foot', SquareFootController::class)->names('square.foot');
    Route::resource('story', StoryController::class)->names('story')->names('story');
    Route::resource('plans', PlanController::class)->names('story')->names('plans');
    Route::resource('price-sheet', PriceSheetController::class)->names('price.sheet');
    //Route::resource('questions', QuestionController::class)->names('questions');
    Route::resource('drive-way', DrivewayController::class)->names('drive.way');
    Route::resource('nu-of-cars', NuofcarController::class)->names('nu.of.cars');
    Route::resource('driveway-price-sheet', DrivewayPriceSheetController::class)->names('driveway.price.sheet');
});
