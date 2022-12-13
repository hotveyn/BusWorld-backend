<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
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


Route::post("login", [UserController::class, "login"]);
Route::post("register", [UserController::class, "store"]);
Route::get("station", [StationController::class, "search"]);
Route::get("trip", [TripController::class, "search"]);
Route::prefix("/booking")->group(function () {
    Route::post("", [BookingController::class, "store"]);
    Route::get("/{code}", [BookingController::class, "index"]);
    Route::get("/{code}/seat", [BookingController::class, "indexSeat"]);
    Route::patch("/{code}/seat", [BookingController::class, "update"]);
});

Route::middleware("auth:api")->group(function () {
    Route::prefix("/user")->group(function (){
        Route::get("", [UserController::class, "index"]);
        Route::get("/booking", [UserController::class, "indexBookings"]);
    });

});

