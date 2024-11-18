<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/brand', function () {
    return view('admin.brand');
});
Route::get('/admin/product', function () {
    return view('admin.product');
});
Route::get('/admin/account', function () {
    return view('admin.account');
});
Route::get('/admin/customer', function () {
    return view('admin.customer');
});
//Route::get('/admin/charts', function () {
  //  return view('admin.charts');
//});
Route::get('/admin/order', function () {
    return view('admin.order
    ');
});
Route::get('/admin/addproduct', function () {
    return view('admin.addproduct');
});
Route::get('/admin/add_brand', function () {
    return view('admin.add_brand');
});
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
Route::get('/admin/product', [ProductController::class, 'index'])->name('Product.index');
use App\Http\Controllers\BrandController;

Route::resource('brands', BrandController::class);
use App\Http\Controllers\UserController;

Route::get('/admin/customer', [UserController::class, 'index'])->name('admin.customer');
