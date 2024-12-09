<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name(name: 'home.index');
Route::get('/shop', [ShopController::class, 'index'])->name(name: 'shop.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
});

Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brand/add', [AdminController::class, 'add_brand'])->name('admin.brand.add');
    Route::post('/admin/brand/store', [AdminController::class, 'brand_store'])->name('admin.brand.store');
    Route::get('/admin/brand/edit/{id}', [AdminController::class, 'edit_brand'])->name('admin.brand.edit');
    Route::put('/admin/brand/update', [AdminController::class, 'brand_update'])->name('admin.brand.update');
    Route::delete('/admin/brand/delete/{id}', [AdminController::class, 'delete_brand'])->name('admin.brand.delete');

    Route::get('/admin/phones', [AdminController::class, 'phones'] )->name('admin.phones');
    Route::post('admin/phones/import', [AdminController::class, 'importExcel'])->name('admin.phones.import'); 
    Route::get('/admin/phone/add', [AdminController::class, 'add_phone'] )->name('admin.phone.add');
    Route::post('/admin/phone/store', [AdminController::class, 'phone_store'])->name('admin.phone.store');
    Route::get('/admin/phone/edit/{id}', [AdminController::class, 'edit_phone'])->name('admin.phone.edit');
    Route::put('/admin/phone/update', [AdminController::class, 'phone_update'])->name('admin.phone.update');
    Route::delete('/admin/phone/delete/{id}', [AdminController::class, 'delete_phone'])->name('admin.phone.delete');
    Route::delete('/admin/phoneVariant/delete/{id}', [AdminController::class, 'delete_phone_variant'])->name('admin.phoneVariant.delete');
});

