<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\fontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('login', function () {
    return view('auth.login');
});




Route::get('/', [FontendController::class, 'index'])->name('');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/user', [FontendController::class, 'index'])->name('');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');

Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');


    /*****************catagory******** */
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/categories-store', [CategoryController::class, 'storecat'])->name('store.category');
    Route::get('admin/categories/edit/{cat_id}', [CategoryController::class, 'Edit']);
    Route::post('/admin/categories-update', [CategoryController::class, 'updatecat'])->name('update.category');
    Route::get('admin/categories/delete/{cat_id}', [CategoryController::class, 'Delete']);
    Route::get('admin/categories/inactive/{cat_id}', [CategoryController::class, 'inactive']);
    Route::get('admin/categories/active/{cat_id}', [CategoryController::class, 'active']);

    /*****************brand******** */

    Route::get('/admin/brand', [BrandController::class, 'index'])->name('admin.brand');
    Route::post('/admin/brand-store', [BrandController::class, 'store'])->name('store.brand');
    Route::get('admin/brand/edit/{brand_id}', [BrandController::class, 'Edit']);
    Route::post('/admin/brand-update', [BrandController::class, 'update'])->name('update.brand');

  /*****************product******** */

    Route::get('/admin/products/add', [ProductController::class, 'addproduct'])->name('add-products');
    Route::post('/admin/products/store', [ProductController::class, 'storeproduct'])->name('store-products');
    Route::get('/admin/products/manage', [ProductController::class, 'manageproduct'])->name('manage-products');
    Route::get('admin/products/edit/{product_id}', [ProductController::class, 'editproduct']);
    Route::post('/admin/products/update', [ProductController::class, 'updateproduct'])->name('update-products');
    Route::post('/admin/products/image-update', [ProductController::class, 'updateimage'])->name('update-image');
    Route::get('admin/products/delete/{product_id}', [ProductController::class, 'destroy']);
    Route::get('admin/products/inactive/{product_id}', [ProductController::class, 'inactive']);
    Route::get('admin/products/active/{product_id}', [ProductController::class, 'active']);


//  *********************admin coupon**************


    Route::get('/admin/coupon', [CouponController::class, 'index'])->name('admin.coupon');
    Route::post('/admin/coupon-store', [CouponController::class, 'store'])->name('store.coupon');
    Route::get('admin/coupon/edit/{coupon_id}', [CouponController::class, 'Edit']);
    Route::post('/admin/coupons/update', [CouponController::class, 'updatecoupon'])->name('update.coupon');
    Route::get('admin/coupon/delete/{Coupon_id}', [CouponController::class, 'destroy']);


    Route::get('/admin/orders', [OrdersController::class, 'index'])->name('admin.orders');
    Route::get('admin/orders/view/{order_id}', [OrdersController::class, 'viewOrder']);
});


Route::get('my_profile', [FontendController::class, 'myprofile'])->name('my_profile');

//  *********************cart**************


Route::post('add/to-cart/{product_id}', [CartController::class, 'addToCard']);
Route::get('cart', [CartController::class, 'cartPage']);
Route::get('cart/destroy/{cart_id}', [CartController::class, 'destroy']);
Route::post('cart/quantity/update/{cart_id}', [CartController::class, 'quantityupdate']);
Route::post('coupon/apply', [CartController::class, 'applyCoupon']);
Route::get('coupon/destroy', [CartController::class, 'Coupondestroy']);


//  *********************wishlist**************

Route::get('add/to-wishlist/{product_id}', [WishlistController::class, 'addTowish']);
Route::get('wishlist', [WishlistController::class, 'wishpage']);
Route::get('wishlist/destroy/{row_id}', [WishlistController::class, 'destroy']);



//  ********************product details**************
Route::get('product/details/{product_id}', [FontendController::class, 'productdetail']);

//  ********************checkout**************
Route::get('checkout', [CheckoutController::class, 'index']);
Route::post('place/order', [OrderController::class, 'storeorder'])->name('place-order');
Route::get('order/success', [OrderController::class, 'ordersuccess']);



Route::get('place/order', [UserController::class, 'order'])->name('user.order');

Route::get('user/order-view/{id}', [UserController::class, 'orderview']);

//  ********************shop page**************


Route::get('shop', [FontendController::class, 'shoppage'])->name('shop.page');


//  ********************categorywise product show**************
Route::get('category/product-show/{id}', [FontendController::class, 'catwiseproduct']);
