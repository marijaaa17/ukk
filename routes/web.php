<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;

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

// Middleware 'auth' diterapkan pada kedua route untuk home, tidak perlu mendefinisikannya dua kali.
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth'); 
Route::get('/home', [HomeController::class, 'index'])->middleware('auth'); 

// Route untuk autentikasi, menggunakan middleware guest
Route::name('auth.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('signup', [AuthController::class, 'signupForm'])->name('signupForm');
        Route::post('signup', [AuthController::class, 'signup'])->name('signup');
    });

    // Logout harus tersedia hanya untuk pengguna yang terautentikasi
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Route untuk semua hal yang berkaitan dengan album
Route::middleware(['auth'])->prefix('album')->name('albums.')->group(function () {
    Route::get('/', [AlbumController::class, 'index'])->name('index');
    Route::get('/create', [AlbumController::class, 'create'])->name('create');
    Route::post('/store', [AlbumController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AlbumController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AlbumController::class, 'update'])->name('update');
    Route::delete('/{id}', [AlbumController::class, 'destroy'])->name('destroy');
    });
});

