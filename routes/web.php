<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\GiziProdukController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\KelurahanController;
use App\Http\Controllers\Admin\KotaController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Admin\MetodePembayaranController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PelangganPointController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeProdukController;
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
Route::get('/register_user', [FrontEndController::class, 'registerUser'])->name('register_user');
Route::post('/register_user', [FrontEndController::class, 'registerUserPost'])->name('register_user_post');
Route::prefix('produk')->group(function() {
    Route::get('/',[HomeProdukController::class, 'produks'])->name('produks');
    Route::get('{produk}/detail',[HomeProdukController::class, 'produkDetail'])->name('produk.detail');
});

Route::prefix('kategori')->group(function() {
    Route::get('{kategoriProduk}/detail',[HomeProdukController::class, 'kategoriDetail'])->name('kategori.detail');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cari_kota',[TransaksiController::class, 'cariKota']);
Route::get('/cari_kecamatan',[TransaksiController::class, 'cariKecamatan']);
Route::get('/cari_kelurahan',[TransaksiController::class, 'cariKelurahan']);
Route::get('/cari_ongkir',[TransaksiController::class, 'cariOngkir']);

Route::middleware('auth')->group(function() {
    Route::get('/cart',[CartController::class, 'cart'])->name('cart');
    Route::get('/successful',[CartController::class, 'successful'])->name('successful');
    Route::post('/cart_post',[CartController::class, 'post'])->name('cart.post');
    Route::delete('{cart}/cart_delete',[CartController::class, 'delete'])->name('cart.delete');
    Route::post('/cart_update',[CartController::class, 'cartUpdate'])->name('cart.update');
    Route::post('/cart_update_kurangi',[CartController::class, 'cartUpdateKurangi'])->name('cart.update_kurangi');
    Route::get('/cari_metode_pembayaran',[CartController::class, 'cariMetode'])->name('cart.cari_metode_pembayaran');
    Route::post('/transaksi',[CartController::class, 'cartTransaksi'])->name('cart.transaksi');

    Route::middleware('isAdmin')->prefix('admin')->group(function() {
        Route::get('/dashboard',[AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

        Route::prefix('manajemen_tag_produk')->group(function() {
            Route::get('/',[TagController::class, 'index'])->name('admin.tag');
            Route::get('/create',[TagController::class, 'create'])->name('admin.tag.create');
            Route::post('/post',[TagController::class, 'store'])->name('admin.tag.post');
            Route::delete('{tagProduk}/delete',[TagController::class, 'destroy'])->name('admin.tag.delete');
        });

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
            Route::post('/post_gambar',[ProdukController::class, 'fotoStore'])->name('admin.produk.foto_post_gambar');
            Route::delete('{foto_produk}/delete_foto',[ProdukController::class, 'fotoDestroy'])->name('admin.produk.delete_foto');

            Route::prefix('kandungan_gizi')->group(function() {
                Route::get('{produk}/',[GiziProdukController::class, 'index'])->name('admin.gizi_produk');
                Route::post('/post',[GiziProdukController::class, 'post'])->name('admin.gizi_produk.post');
                Route::delete('/{produk}/{id_tag}/delete',[GiziProdukController::class, 'destroy'])->name('admin.gizi_produk.delete');
            });
        });

        Route::prefix('metode_pembayaran')->group(function() {
            Route::get('/',[MetodePembayaranController::class, 'index'])->name('admin.metode');
            Route::get('/create',[MetodePembayaranController::class, 'create'])->name('admin.metode.create');
            Route::post('/post',[MetodePembayaranController::class, 'store'])->name('admin.metode.post');
            Route::get('/{metodePembayaran}/edit',[MetodePembayaranController::class, 'edit'])->name('admin.metode.edit');
            Route::patch('/{metodePembayaran}/update',[MetodePembayaranController::class, 'update'])->name('admin.metode.update');
            Route::delete('{metodePembayaran}/delete',[MetodePembayaranController::class, 'destroy'])->name('admin.metode.delete');
        });

        Route::prefix('data_provinsi')->group(function() {
            Route::get('/',[ProvinsiController::class, 'index'])->name('admin.provinsi');
            Route::get('/create',[ProvinsiController::class, 'create'])->name('admin.provinsi.create');
            Route::post('/post',[ProvinsiController::class, 'store'])->name('admin.provinsi.post');
            Route::get('/{metodePembayaran}/edit',[ProvinsiController::class, 'edit'])->name('admin.provinsi.edit');
            Route::patch('/{metodePembayaran}/update',[ProvinsiController::class, 'update'])->name('admin.provinsi.update');
            Route::delete('{metodePembayaran}/delete',[ProvinsiController::class, 'destroy'])->name('admin.provinsi.delete');
        });

        Route::prefix('data_kota')->group(function() {
            Route::get('/',[KotaController::class, 'index'])->name('admin.kota');
            Route::get('/create',[KotaController::class, 'create'])->name('admin.kota.create');
            Route::post('/post',[KotaController::class, 'store'])->name('admin.kota.post');
            Route::get('/{metodePembayaran}/edit',[KotaController::class, 'edit'])->name('admin.kota.edit');
            Route::patch('/{metodePembayaran}/update',[KotaController::class, 'update'])->name('admin.kota.update');
            Route::delete('{metodePembayaran}/delete',[KotaController::class, 'destroy'])->name('admin.kota.delete');
        });

        Route::prefix('data_kecamatan')->group(function() {
            Route::get('/',[KecamatanController::class, 'index'])->name('admin.kecamatan');
            Route::get('/create',[KecamatanController::class, 'create'])->name('admin.kecamatan.create');
            Route::post('/post',[KecamatanController::class, 'store'])->name('admin.kecamatan.post');
            Route::get('/{metodePembayaran}/edit',[KecamatanController::class, 'edit'])->name('admin.kecamatan.edit');
            Route::patch('/{metodePembayaran}/update',[KecamatanController::class, 'update'])->name('admin.kecamatan.update');

            Route::get('{kecamatan}/',[KelurahanController::class, 'index'])->name('admin.kelurahan');
            Route::patch('{kecamatan}/kelurahan/{kelurahan}',[KelurahanController::class, 'update'])->name('admin.kelurahan.update');
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
            Route::get('{transaksi}/show',[TransaksiController::class, 'show'])->name('admin.transaksi.show');

        });

        Route::prefix('manajemen_data_operator')->group(function() {
            Route::get('/',[OperatorController::class, 'index'])->name('admin.operator');
            Route::get('/create',[OperatorController::class, 'create'])->name('admin.operator.create');
            Route::post('/post',[OperatorController::class, 'store'])->name('admin.operator.post');
            Route::get('/{operator}/edit',[OperatorController::class, 'edit'])->name('admin.operator.edit');
            Route::patch('/{operator}/update',[OperatorController::class, 'update'])->name('admin.operator.update');
            Route::delete('{operator}/delete',[OperatorController::class, 'destroy'])->name('admin.operator.delete');
            Route::get('{operator}/show',[OperatorController::class, 'show'])->name('admin.operator.show');
        });

        Route::prefix('manajemen_data_driver')->group(function() {
            Route::get('/',[DriverController::class, 'index'])->name('admin.driver');
            Route::get('/create',[DriverController::class, 'create'])->name('admin.driver.create');
            Route::post('/post',[DriverController::class, 'store'])->name('admin.driver.post');
            Route::get('/{driver}/edit',[DriverController::class, 'edit'])->name('admin.driver.edit');
            Route::patch('/{driver}/update',[DriverController::class, 'update'])->name('admin.driver.update');
            Route::delete('{driver}/delete',[DriverController::class, 'destroy'])->name('admin.driver.delete');
            Route::get('{driver}/show',[DriverController::class, 'show'])->name('admin.driver.show');
        });

        Route::prefix('manajemen_data_administrator')->group(function() {
            Route::get('/',[AdministratorController::class, 'index'])->name('admin.administrator');
            Route::get('/create',[AdministratorController::class, 'create'])->name('admin.administrator.create');
            Route::post('/post',[AdministratorController::class, 'store'])->name('admin.administrator.post');
            Route::get('/{administrator}/edit',[AdministratorController::class, 'edit'])->name('admin.administrator.edit');
            Route::patch('/{administrator}/update',[AdministratorController::class, 'update'])->name('admin.administrator.update');
            Route::delete('{administrator}/delete',[AdministratorController::class, 'destroy'])->name('admin.administrator.delete');
            Route::get('{administrator}/show',[AdministratorController::class, 'show'])->name('admin.administrator.show');
        });
    });
});
