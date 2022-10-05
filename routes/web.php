<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\fontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
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

 /*Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', [FontendController::class, 'index'])->name('');


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





});


//  *********************admin route**************
//****** *category section********








