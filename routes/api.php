<?php

use App\Http\Controllers\StationController;
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
Route::get("trip", [StationController::class, "search"]);

Route::middleware("auth:api")->group(function (){

});

