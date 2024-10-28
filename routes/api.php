<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\TourController;
use App\Http\Controllers\Client\Tour\{HotelController, GuideController};

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tour-hotels/{tour_id}', [HotelController::class, 'index']);
    Route::get('/tour-guides/{id}', [GuideController::class, 'index']);
    Route::get('/tour/place-search/{keyword}/{tour_id}', [HotelController::class, 'search']);
//});

