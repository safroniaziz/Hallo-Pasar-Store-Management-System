<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Admin\MetodePembayaranController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PelangganPointController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontEndController::class, 'index'])->name('home');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::middleware('isAdmin')->prefix('admin')->group(function() {
        Route::get('/dashboard',[AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

        Route::prefix('manajemen_kategori_produk')->group(function() {
            Route::get('/',[KategoriProdukController::class, 'index'])->name('admin.kategori_produk');
            Route::get('/create',[KategoriProdukController::class, 'create'])->name('admin.kategori_produk.create');
            Route::post('/post',[KategoriProdukController::class, 'store'])->name('admin.kategori_produk.post');
            Route::get('/{kategoriProduk}/edit',[KategoriProdukController::class, 'edit'])->name('admin.kategori_produk.edit');
            Route::patch('/{kategoriProduk}/update',[KategoriProdukController::class, 'update'])->name('admin.kategori_produk.update');
            Route::delete('{kategoriProduk}/delete',[KategoriProdukController::class, 'destroy'])->name('admin.kategori_produk.delete');
        });

        Route::prefix('manajemen_data_produk')->group(function() {
            Route::get('/',[ProdukController::class, 'index'])->name('admin.produk');
            Route::get('/create',[ProdukController::class, 'create'])->name('admin.produk.create');
            Route::post('/post',[ProdukController::class, 'store'])->name('admin.produk.post');
            Route::get('/{produk}/edit',[ProdukController::class, 'edit'])->name('admin.produk.edit');
            Route::patch('/{produk}/update',[ProdukController::class, 'update'])->name('admin.produk.update');
            Route::delete('{produk}/delete',[ProdukController::class, 'destroy'])->name('admin.produk.delete');
            Route::get('{produk}/show',[ProdukController::class, 'show'])->name('admin.produk.show');

            Route::post('{produk}/post',[ProdukController::class, 'fotoStore'])->name('admin.produk.foto_post');
            Route::delete('{foto_produk}/delete_foto',[ProdukController::class, 'fotoDestroy'])->name('admin.produk.delete_foto');

        });

        Route::prefix('metode_pembayaran')->group(function() {
            Route::get('/',[MetodePembayaranController::class, 'index'])->name('admin.metode');
            Route::get('/create',[MetodePembayaranController::class, 'create'])->name('admin.metode.create');
            Route::post('/post',[MetodePembayaranController::class, 'store'])->name('admin.metode.post');
            Route::get('/{metodePembayaran}/edit',[MetodePembayaranController::class, 'edit'])->name('admin.metode.edit');
            Route::patch('/{metodePembayaran}/update',[MetodePembayaranController::class, 'update'])->name('admin.metode.update');
            Route::delete('{metodePembayaran}/delete',[MetodePembayaranController::class, 'destroy'])->name('admin.metode.delete');
        });

        Route::prefix('data_pelanggan')->group(function() {
            Route::get('/',[PelangganController::class, 'index'])->name('admin.pelanggan');
            Route::get('/create',[PelangganController::class, 'create'])->name('admin.pelanggan.create');
            Route::post('/post',[PelangganController::class, 'store'])->name('admin.pelanggan.post');
            Route::get('/{pelanggan}/edit',[PelangganController::class, 'edit'])->name('admin.pelanggan.edit');
            Route::patch('/{pelanggan}/update',[PelangganController::class, 'update'])->name('admin.pelanggan.update');
            Route::delete('{pelanggan}/delete',[PelangganController::class, 'destroy'])->name('admin.pelanggan.delete');
            Route::get('{pelanggan}/show',[PelangganController::class, 'show'])->name('admin.pelanggan.show');

            Route::post('{pelanggan}/post',[PelangganPointController::class, 'store'])->name('admin.pelanggan.point_post');
        });

        Route::prefix('transaksi')->group(function() {
            Route::get('/',[TransaksiController::class, 'index'])->name('admin.transaksi');
            Route::get('/create',[TransaksiController::class, 'create'])->name('admin.transaksi.create');
            Route::post('/post',[TransaksiController::class, 'store'])->name('admin.transaksi.post');
            Route::get('/{transaksi}/edit',[TransaksiController::class, 'edit'])->name('admin.transaksi.edit');
            Route::patch('/{transaksi}/update',[TransaksiController::class, 'update'])->name('admin.transaksi.update');
            Route::delete('{transaksi}/delete',[TransaksiController::class, 'destroy'])->name('admin.transaksi.delete');

        });
    });
});
