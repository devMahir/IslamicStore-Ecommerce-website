<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//login==========admin==========logout 
Route::get('admin/home', [AdminController::class, 'index']);
Route::get('admin', [LoginController::class, 'showLoginFrom'])->name('admin.login');
Route::post('admin', [LoginController::class, 'login']);
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


//=================Admin_Backend_Work===============


//Category Section
Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
Route::post('admin/categories-store', [CategoryController::class, 'storeCat'])->name('store.category');
Route::get('admin/categories/edit/{cat_id}', [CategoryController::class, 'edit']);
Route::post('admin/categories-update', [CategoryController::class, 'updateCategory'])->name('update.category');
Route::get('admin/categories/delete/{cat_id}', [CategoryController::class, 'delete']);
Route::get('admin/categories/inactive/{cat_id}', [CategoryController::class, 'inactive']);
Route::get('admin/categories/active/{cat_id}', [CategoryController::class, 'active']);


//Brand Section
Route::get('admin/brand', [BrandController::class, 'index'])->name('admin.brand');
Route::post('admin/brand-store', [BrandController::class, 'store'])->name('store.brand');
Route::get('admin/brand/edit/{brand_id}', [BrandController::class, 'edit']);
Route::post('admin/brand-update', [BrandController::class, 'update'])->name('update.brand');
Route::get('admin/brand/delete/{brand_id}', [BrandController::class, 'delete']);
Route::get('admin/brand/inactive/{brand_id}', [BrandController::class, 'inactive']);
Route::get('admin/brand/active/{brand_id}', [BrandController::class, 'active']);


//Product Section
Route::get('admin/products/add_products', [ProductController::class, 'addProduct'])->name('add_products');
Route::post('admin/products/store', [ProductController::class, 'storeProduct'])->name('store_products');
Route::get('admin/products/manage', [ProductController::class, 'manageProduct'])->name('manage_products');
Route::get('admin/products/edit/{product_id}', [ProductController::class, 'editProduct']);
Route::post('admin/products/update', [ProductController::class, 'updateProduct'])->name('update_products');
Route::post('admin/products/image-update', [ProductController::class, 'updateImage'])->name('update_image');
Route::get('admin/products/delete/{product_id}',[ProductController::class, 'destroy']);
Route::get('admin/products/inactive/{product_id}',[ProductController::class, 'Inactive']);
Route::get('admin/products/active/{product_id}',[ProductController::class, 'Active']);


//Coupon
Route::get('admin/coupon',[CouponController::class, 'index'])->name('admin.coupon');
Route::post('admin/coupon/store',[CouponController::class, 'store'])->name('store.coupon');
Route::get('admin/coupon/edit/{coupon_id}',[CouponController::class, 'couponEdit']);
Route::post('admin/coupon-update',[CouponController::class, 'update'])->name('update.coupon');
Route::get('admin/coupon/delete/{coupon_id}',[CouponController::class, 'couponDelete']);
Route::get('admin/coupon/inactive/{coupon_id}',[CouponController::class, 'Inactive']);
Route::get('admin/coupon/active/{coupon_id}',[CouponController::class, 'Active']);

//Order
Route::get('admin/orders',[CouponController::class, 'orderIndex'])->name('admin.orders');
Route::get('admin/orders/view/{id}',[CouponController::class, 'viewOrder']);


//=================Frontend_Part=====================

//Cart
Route::post('add/to-cart/{prouct_id}', [CartController::class, 'addToCart']);
Route::get('cart', [CartController::class, 'cartPage']);
Route::get('cart/destroy/{cart_id}', [CartController::class, 'destroy']);
Route::post('cart/quantity/update/{cart_id}', [CartController::class, 'quantityUpdate']);
Route::post('coupon/apply', [CartController::class, 'applyCoupon']);
Route::get('coupon/destroy', [CartController::class, 'couponDestroy']);


//wishlist 
Route::get('add/to-wishlist/{prouct_id}', [WishlistController::class, 'addToWishlist']);
Route::get('wishlist', [WishlistController::class, 'wishPage']);
Route::get('wishlist/destroy/{wishlist_id}', [WishlistController::class, 'destroy']);


//Product Details
Route::get('product/details/{product_id}', [FrontendController::class, 'productDetail']);


//checkout page
Route::get('checkout', [CheckoutController::class, 'index']);
Route::post('place/order', [OrderController::class, 'storeOrder'])->name('place_order');
Route::get('order/success', [OrderController::class, 'orderSuccess']);
