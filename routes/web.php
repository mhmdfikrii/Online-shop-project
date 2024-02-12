<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CategoryProductController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\dashboard\AlamatController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\DetailUsersController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Index
Route::get('/', [IndexController::class, 'index'])->name('home');

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/register', [LoginController::class, 'store'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('user');

// Detail Users
Route::get('/users_details/{account}', [DetailUsersController::class, 'index'])->middleware('user');
Route::get('/account-scurity/{account}', [DetailUsersController::class, 'ViewChangePassword'])->middleware('user');
Route::put('/account-scurity/{account}', [DetailUsersController::class, 'ChangePassword'])->middleware('user');
Route::put('/users_details/{account}', [DetailUsersController::class, 'updateUser'])->middleware('user');
Route::get('/check-username/{username}', [DetailUsersController::class, 'checkUsernameAvailability'])->middleware('user');

// Alamat Users
Route::get('/alamat', [AlamatController::class, 'index'])->middleware('user')->name('Alamat');
Route::get('/tambah_alamat', [AlamatController::class, 'create'])->middleware('user')->name('tambah alamat');
Route::post('/tambah_alamat', [AlamatController::class, 'store'])->middleware('user');
Route::get('/edit_alamat/{id}', [AlamatController::class, 'edit'])->middleware('user')->name('edit alamat');
Route::put('/edit_alamat/{id}', [AlamatController::class, 'update'])->middleware('user')->name('update alamat');
Route::delete('/alamat/{id}', [AlamatController::class, 'destroy'])->middleware('user')->name('delete alamat');

// Admin Dashboard
Route::get('/dashboard-admin', [AdminDashboardController::class, 'index'])->middleware('admin');

// Admin Account
Route::get('/admin_details/{account}', [AdminController::class, 'index'])->middleware('admin');
Route::put('/admin_details/{account}', [AdminController::class, 'updateAdmin'])->middleware('admin');
Route::get('/admin-account-scurity/{account}', [AdminController::class, 'ViewAdminChangePassword'])->middleware('admin');
Route::put('/admin-account-scurity/{account}', [AdminController::class, 'AdminChangePassword'])->middleware('admin');

// Product
Route::get('/product_admin', [ProductController::class, 'index'])->middleware('admin');
Route::get('/tambah-produk', [ProductController::class, 'create'])->middleware('admin');
Route::post('/tambah-produk', [ProductController::class, 'store'])->middleware('admin');

// Category Product
Route::get('/create-category', [CategoryProductController::class, 'index'])->middleware('admin');
Route::post('/create-category', [CategoryProductController::class, 'store'])->middleware('admin');
Route::delete('/create-category/{id}', [CategoryProductController::class, 'destroy'])->middleware('admin');
