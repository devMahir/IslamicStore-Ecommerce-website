<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin
Route::get('admin/home', [AdminController::class, 'index']);
Route::get('admin', [LoginController::class, 'showLoginFrom'])->name('admin.login');
Route::post('admin', [LoginController::class, 'login']);
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');