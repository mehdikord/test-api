<?php
use Illuminate\Support\Facades\Route;

//Guests routing
Route::apiResource('guests',\App\Http\Controllers\Guests\GuestController::class);
