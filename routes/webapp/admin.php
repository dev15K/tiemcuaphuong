<?php

/*
|--------------------------------------------------------------------------
| Admin Routes Web
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\admin\AdminAttributeController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminConsultantController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminPropertyController;
use App\Http\Controllers\admin\AdminPurchaseController;
use App\Http\Controllers\admin\AdminSettingController;
use App\Http\Controllers\admin\AdminUserController;

Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.home');

Route::group(['prefix' => 'app-settings'], function () {
    Route::get('/index', [AdminSettingController::class, 'index'])->name('admin.app.setting.index');
    Route::post('/store', [AdminSettingController::class, 'appSetting'])->name('admin.app.setting.store');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/list', [AdminCategoryController::class, 'list'])->name('admin.categories.list');
    Route::get('/detail/{id}', [AdminCategoryController::class, 'detail'])->name('admin.categories.detail');
    Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/store', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.categories.delete');
});

Route::group(['prefix' => 'attributes'], function () {
    Route::get('/list', [AdminAttributeController::class, 'list'])->name('admin.attributes.list');
    Route::get('/detail/{id}', [AdminAttributeController::class, 'detail'])->name('admin.attributes.detail');
    Route::get('/create', [AdminAttributeController::class, 'create'])->name('admin.attributes.create');
    Route::post('/store', [AdminAttributeController::class, 'store'])->name('admin.attributes.store');
    Route::put('/update/{id}', [AdminAttributeController::class, 'update'])->name('admin.attributes.update');
    Route::delete('/delete/{id}', [AdminAttributeController::class, 'delete'])->name('admin.attributes.delete');
});

Route::group(['prefix' => 'properties'], function () {
    Route::get('/list', [AdminPropertyController::class, 'list'])->name('admin.properties.list');
    Route::get('/detail/{id}', [AdminPropertyController::class, 'detail'])->name('admin.properties.detail');
    Route::get('/create', [AdminPropertyController::class, 'create'])->name('admin.properties.create');
    Route::post('/store', [AdminPropertyController::class, 'store'])->name('admin.properties.store');
    Route::put('/update/{id}', [AdminPropertyController::class, 'update'])->name('admin.properties.update');
    Route::delete('/delete/{id}', [AdminPropertyController::class, 'delete'])->name('admin.properties.delete');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/list', [AdminProductController::class, 'list'])->name('admin.products.list');
    Route::get('/detail/{id}', [AdminProductController::class, 'detail'])->name('admin.products.detail');
    Route::get('/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.products.delete');
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('/list', [AdminOrderController::class, 'list'])->name('admin.orders.list');
    Route::get('/detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.orders.detail');
    Route::put('/update/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.orders.delete');
});

Route::group(['prefix' => 'purchases'], function () {
    Route::get('/list', [AdminPurchaseController::class, 'list'])->name('admin.purchases.list');
    Route::get('/detail/{id}', [AdminPurchaseController::class, 'detail'])->name('admin.purchases.detail');
    Route::put('/update/{id}', [AdminPurchaseController::class, 'update'])->name('admin.purchases.update');
    Route::delete('/delete/{id}', [AdminPurchaseController::class, 'delete'])->name('admin.purchases.delete');
});

Route::group(['prefix' => 'consultants'], function () {
    Route::get('/list', [AdminConsultantController::class, 'list'])->name('admin.consultants.list');
    Route::get('/detail/{id}', [AdminConsultantController::class, 'detail'])->name('admin.consultants.detail');
    Route::put('/update/{id}', [AdminConsultantController::class, 'update'])->name('admin.consultants.update');
    Route::delete('/delete/{id}', [AdminConsultantController::class, 'delete'])->name('admin.consultants.delete');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/list', [AdminUserController::class, 'list'])->name('admin.users.list');
    Route::get('/detail/{id}', [AdminUserController::class, 'detail'])->name('admin.users.detail');
    Route::get('/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/store', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/delete/{id}', [AdminUserController::class, 'delete'])->name('admin.users.delete');
});

Route::group(['prefix' => 'api'], function () {

});
