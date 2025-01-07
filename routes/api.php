<?php
use Illuminate\Support\Facades\Route;

//Guests routing
Route::apiResource('guests',\App\Http\Controllers\Guests\GuestController::class);

//Room Statuses
Route::apiResource('rooms/statuses',App\Http\Controllers\Rooms\RoomStatusController::class);

//Rooms
Route::apiResource('rooms',App\Http\Controllers\Rooms\RoomController::class);

//Room Guests
Route::prefix('rooms')->as('rooms.')->group(function (){

    Route::prefix('{room}/guests')->as('guests.')->group(function (){
        Route::get('',[\App\Http\Controllers\Rooms\RoomController::class,'guests_index'])->name('index');
        Route::post('',[\App\Http\Controllers\Rooms\RoomController::class,'guests_store'])->name('index');
        Route::delete('/{guest}',[\App\Http\Controllers\Rooms\RoomController::class,'guests_delete'])->name('index');
    });


});
