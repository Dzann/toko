<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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



Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/', [UserController::class, 'home'])->name('home');

Route::get('/detail/{produk}', [UserController::class, 'detailProduk'])->name('detailProduk');

Route::middleware('auth')->group(function () {
    
    //customers
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('postkeranjang/{produk}', [UserController::class, 'postkeranjang'])->name('pelanggan.postkeranjang');
    Route::get('keranjang', [UserController::class, 'keranjang'])->name('pelanggan.keranjang');
    Route::get('bayar/{detailtransaksi}', [UserController::class, 'bayar'])->name('pelanggan.bayar');
    Route::post('prosesbayar/{detailtransaksi}', [UserController::class, 'prosesbayar'])->name('pelanggan.prosesbayar');
    Route::get('summary', [UserController::class, 'summary'])->name('pelanggan.summary');

    //admin
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/tampiltambahProduk', [AdminController::class, 'tampilTambahProduk'])->name('admin.tampilTambahProduk');
    Route::post('admin/tambahProduk', [AdminController::class, 'tambahProduk'])->name('admin.tambahProduk');
    
});
