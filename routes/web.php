<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\OpnameSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HasilStockOpnameController;

/*
|--------------------------------------------------------------------------
| Auth Routes (Login & Logout)
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Redirect Root to Login
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (hanya bisa diakses jika sudah login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Item / Barang
    Route::get('/items/import', [ItemController::class, 'showImportForm'])->name('items.import.form');
    Route::post('/items/import', [ItemController::class, 'import'])->name('items.import');
    Route::resource('items', ItemController::class);

    // Stock Opname
    Route::get('/stock-opname', [StockOpnameController::class, 'index'])->name('stock-opname.index');

    // Sesi Stock Opname
    Route::prefix('opname-sessions')->name('opname_sessions.')->group(function () {
        Route::get('/', [OpnameSessionController::class, 'index'])->name('index');
        Route::get('/create', [OpnameSessionController::class, 'create'])->name('create');
        Route::post('/', [OpnameSessionController::class, 'store'])->name('store');
        Route::get('/{id}', [OpnameSessionController::class, 'show'])->name('show');
        Route::post('/{id}/approve/{opname_id}', [OpnameSessionController::class, 'approveItem'])->name('approve_item');
    });

    // Kelola User
    Route::resource('users', UserController::class);

    // Admin section
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

    // Hasil Stock Opname
    Route::get('/hasil-opname', [HasilStockOpnameController::class, 'index'])->name('hasil-opname.index');


});
