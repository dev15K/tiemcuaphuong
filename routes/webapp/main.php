<?php

use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\PropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Main Routes Web
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/consultant', [HomeController::class, 'consultant'])->name('home.consultant');
Route::get('/purchases', [HomeController::class, 'purchases'])->name('home.purchases');
Route::get('/products/list', [HomeController::class, 'index'])->name('home.products.list');
Route::get('/products/detail', [HomeController::class, 'index'])->name('home.products.detail');

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'properties'], function () {
        Route::get('/list', [PropertyController::class, 'list'])->name('api.properties.list');
    });
});

