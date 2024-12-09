<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AboutController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;

Auth::routes(['register' => true]);

Route::get('/', [HomeController::class, 'index'])->name(name: 'home.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/phone/{id}', [ShopController::class, 'show'])->name('phone.show');
Route::post('/phone/{id}/add-to-cart', [CartController::class, 'add'])->name('phone.add_to_cart');
Route::get('/order-confirmation', [CheckoutController::class, 'orderConfirmation'])->name('order.confirmation');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('change-password');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    // Route::post('/profile/update-picture', [UserController::class, 'updateProfilePicture'])->name('profile.update_picture');
    Route::post('/change-password', [UserController::class, 'updatePassword'])->name('change-password.update');
    Route::get('/account-orders', [UserController::class, 'orders'])->name('account.orders');
    Route::get('/account-order-details/{id}', [UserController::class, 'orderDetails'])->name('account.order_details');
    Route::put('/account-order/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('account.cancel_order');
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

