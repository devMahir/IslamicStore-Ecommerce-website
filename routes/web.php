<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;

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


