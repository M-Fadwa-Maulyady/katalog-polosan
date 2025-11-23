<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataCatalogController;
use Illuminate\Support\Facades\Route;

// Halaman pertama → HOME
Route::get('/', function () {
    return redirect()->route('home');
});

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// USER PAGES
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/catalog', [DataCatalogController::class, 'userCatalog'])->name('catalog');
Route::get('/contact', fn() => view('contact'))->name('contact');


// ✨ ✨ CHECKOUT — HARUS DI LUAR ADMIN GROUP ✨ ✨
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});


// ✨ ADMIN PAGE ✨
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::prefix('datacatalog')->name('datacatalog.')->group(function () {
        Route::get('/', [DataCatalogController::class, 'index'])->name('index');
        Route::get('/create', [DataCatalogController::class, 'create'])->name('create');
        Route::post('/store', [DataCatalogController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DataCatalogController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DataCatalogController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DataCatalogController::class, 'destroy'])->name('delete');
        Route::get('/detail/{id}', [DataCatalogController::class, 'detail'])->name('detail');
    });

    Route::get('/data-anggota', [AnggotaController::class, 'index'])->name('dataAnggota');
    Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('createAnggota');
    Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('storeAnggota');
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('editAnggota');
    Route::put('/anggota/update/{id}', [AnggotaController::class, 'update'])->name('updateAnggota');
    Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'destroy'])->name('deleteAnggota');
});
