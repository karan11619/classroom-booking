<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\BookingController;

Route::get('/classes', [ClassroomController::class, 'getClasses']);
Route::post('/book', [BookingController::class, 'bookClass']);
Route::post('/cancel', [BookingController::class, 'cancelClass']);

