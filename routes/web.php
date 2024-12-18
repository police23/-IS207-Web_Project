<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AboutController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;

Auth::routes(['register' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/phone/{id}', [ShopController::class, 'show'])->name('phone.show');
Route::post('/phone/{id}/add-to-cart', [CartController::class, 'add'])->name('phone.add_to_cart');
Route::post('/phone/{id}/add-review', [ReviewController::class, 'store'])->name('phone.add_review');
Route::post('/phone/{id}/can-review', [ReviewController::class, 'canReview'])->name('phone.can_review');
Route::put('/phone/{id}/update-review', [ReviewController::class, 'update'])->name('phone.update_review');
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
    Route::get('/payment/vnpay', [PaymentController::class,'redirectToVNPAY'])->name('payment.vnpay');
    Route::get('/payment/vnpay/return', [PaymentController::class,'handleVNPAYReturn'])->name('payment.vnpay.return');
});

Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin/top-products', [AdminController::class, 'getTopProducts'])->name('admin.top-products'); // Thay AdminController bằng controller của bạn
    Route::get('/admin/phone-quantity-data', [AdminController::class, 'getMonthlyQuantity']);
    Route::get('/admin/phone-revenue-data', [AdminController::class, 'getMonthlyRevenue'])->name('admin.chart-data-bar');
    Route::get('/admin/top-selling-products', [AdminController::class, 'getTopSellingPhones']);

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

    Route::get('/admin/orders', [AdminController::class,'orders'])->name('admin.orders');
    Route::get('/admin/order/{order_id}/details', [AdminController::class,'order_details'])->name('admin.order.details');
    Route::put('/admin/order/update-status', [AdminController::class, 'update_order_status'])->name('admin.order.status.update');

    Route::get('/admin/customers', [AdminController::class, 'customers'])->name('admin.customers');
    Route::get('/admin/customer/edit/{id}', [AdminController::class, 'editCustomer'])->name('admin.customer.edit');
    Route::put('/admin/customer/update/{id}', [AdminController::class, 'updateCustomer'])->name('admin.customer.update');
    Route::delete('/admin/customer/delete/{id}', [AdminController::class, 'deleteCustomer'])->name('admin.customer.delete');
    Route::get('/admin/discount', [AdminController::class, 'discount'])->name('admin.discount');
    Route::get('/admin/coupons', [AdminController::class, 'discount'])->name('admin.coupons');
    Route::get('/admin/coupon/add', [AdminController::class, 'addCoupon'])->name('admin.coupon.add');
    Route::post('/admin/coupon/store', [AdminController::class, 'storeCoupon'])->name('admin.coupon.store');
    Route::get('/admin/coupon/edit/{id}', [AdminController::class, 'editCoupon'])->name('admin.coupon.edit');
    Route::put('/admin/coupon/update/{id}', [AdminController::class, 'updateCoupon'])->name('admin.coupon.update');
    Route::delete('/admin/coupon/delete/{id}', [AdminController::class, 'deleteCoupon'])->name('admin.coupon.delete');
    
});
