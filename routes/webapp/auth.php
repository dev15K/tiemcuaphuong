<?php

use App\Http\Controllers\clients\ConsultantController;
use App\Http\Controllers\clients\PurchaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes Web
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => ''], function () {
    Route::group(['prefix' => 'purchases'], function () {
        Route::post('/store', [PurchaseController::class, 'store'])->name('auth.purchases.store');
    });

    Route::group(['prefix' => 'consultants'], function () {
        Route::post('/store', [ConsultantController::class, 'store'])->name('auth.consultants.store');
    });
});

Route::group(['prefix' => 'api'], function () {

});
