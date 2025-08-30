<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AddressController;

Route::prefix('dashboard/v1')->group(function () {

    Route::prefix('address')->group(function () {
        Route::get('select' , [AddressController::class , 'select']);
    });
});
