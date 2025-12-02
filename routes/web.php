<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataCatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RiwayatController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [DataCatalogController::class, 'userCatalog'])->name('catalog');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


// ✨ USER AUTH AREA (checkout + riwayat) ✨
Route::middleware(['auth'])->group(function () {

    // Checkout
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    // Riwayat Pesanan User
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
});


// ✨ ADMIN PAGE ✨
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Catalog
    Route::prefix('datacatalog')->name('datacatalog.')->group(function () {
        Route::get('/', [DataCatalogController::class, 'index'])->name('index');
        Route::get('/create', [DataCatalogController::class, 'create'])->name('create');
        Route::post('/store', [DataCatalogController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DataCatalogController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DataCatalogController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DataCatalogController::class, 'destroy'])->name('delete');
        Route::get('/detail/{id}', [DataCatalogController::class, 'detail'])->name('detail');
    });

    // Orders Admin
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::delete('/orders/{id}', [OrderController::class, 'delete'])->name('orders.delete');
    Route::post('/orders/{id}/{status}', [OrderController::class, 'updateStatus'])->name('orders.status');

    // Anggota
    Route::get('/data-anggota', [AnggotaController::class, 'index'])->name('dataAnggota');
    Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('createAnggota');
    Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('storeAnggota');
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('editAnggota');
    Route::put('/anggota/update/{id}', [AnggotaController::class, 'update'])->name('updateAnggota');
    Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'destroy'])->name('deleteAnggota');
});
