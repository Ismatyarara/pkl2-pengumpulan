<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruProfileController;
use App\Http\Controllers\FormKelasController;
use App\Http\Controllers\SiswaProfileController;
use App\Http\Controllers\BackendController;
use App\Http\Middleware\Admin;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Auth scaffolding
Auth::routes();

// Dashboard umum (untuk semua user login)
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// Group: Hanya untuk user yang login
Route::middleware('auth')->group(function () {
    // Halaman Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource CRUD
    Route::resource('user', UserController::class);
    Route::resource('guru_profiles', GuruProfileController::class);
    Route::resource('siswa_profiles', SiswaProfileController::class);
});

Route::middleware(['auth', Admin::class])
    ->prefix('admin')
    ->name('backend.')
    ->group(function () {
        Route::get('/', [BackendController::class, 'index'])->name('dashboard');

        // 👇 Tambahkan route user CRUD untuk admin
        Route::resource('user', UserController::class);
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
           Route::post('/user', [UserController::class, 'store'])->name('user.update');


        //Kamu juga bisa pindahin resource lain kalau emang hanya admin yang akses:
        Route::resource('guru_profiles', GuruProfileController::class);
         Route::post('/guru_profiles', [GuruProfileController::class, 'store'])->name('guru_profiles.store');



        Route::resource('siswa_profiles', SiswaProfileController::class);


         Route::resource('form_kelas', FormKelasController::class);
    });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
