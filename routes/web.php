<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\dashboard\AlamatController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\DetailUsersController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Detail Users
Route::get('/users_details/{account}', [DetailUsersController::class, 'index'])->middleware('auth');
Route::get('/account-scurity/{account}', [DetailUsersController::class, 'ViewChangePassword'])->middleware('auth');
Route::put('/account-scurity/{account}', [DetailUsersController::class, 'ChangePassword'])->middleware('auth');
Route::put('/users_details/{account}', [DetailUsersController::class, 'updateUser'])->middleware('auth');
Route::get('/check-username/{username}', [DetailUsersController::class, 'checkUsernameAvailability'])->middleware('auth');


// Alamat Users
Route::get('/alamat', [AlamatController::class, 'index'])->middleware('auth')->name('Alamat');
Route::get('/tambah_alamat', [AlamatController::class, 'create'])->middleware('auth')->name('tambah alamat');
Route::post('/tambah_alamat', [AlamatController::class, 'store'])->middleware('auth');
Route::get('/edit_alamat/{id}', [AlamatController::class, 'edit'])->middleware('auth')->name('edit alamat');
Route::put('/edit_alamat/{id}', [AlamatController::class, 'update'])->middleware('auth')->name('update alamat');
Route::delete('/alamat/{id}', [AlamatController::class, 'destroy'])->middleware('auth')->name('delete alamat');

// Admin Dashboard
Route::get('/dashboard-admin', [AdminDashboardController::class, 'index'])->middleware('admin');

// Admin
Route::get('/admin_details/{account}', [AdminController::class, 'index'])->middleware('admin');
Route::put('/admin_details/{account}', [AdminController::class, 'updateAdmin'])->middleware('admin');
Route::get('/admin-account-scurity/{account}', [AdminController::class, 'ViewAdminChangePassword'])->middleware('admin');
Route::put('/admin-account-scurity/{account}', [AdminController::class, 'AdminChangePassword'])->middleware('admin');
