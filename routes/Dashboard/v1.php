<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AddressController;

Route::prefix('dashboard/v1')->group(function () {

    Route::prefix('address')->group(function () {
        Route::get('select' , [AddressController::class , 'select']);
        Route::post('create' , [AddressController::class , 'create']);
        Route::put('update/{id}' , [AddressController::class , 'update']);
        Route::delete('delete/{id}' , [AddressController::class , 'delete']);
    });
});
