<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('customer', CustomerController::class);
Route::apiResource('hotel', HotelController::class);

Route::get('/login', [App\Http\Controllers\CustomerController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\CustomerController::class, 'register']);
