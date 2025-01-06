<?php
use Illuminate\Support\Facades\Route;

//Guests routing
Route::apiResource('guests',\App\Http\Controllers\Guests\GuestController::class);

//Room Statuses
Route::apiResource('rooms/statuses',App\Http\Controllers\Rooms\RoomStatusController::class);
//Rooms
Route::apiResource('rooms',App\Http\Controllers\Rooms\RoomController::class);
