<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\PelangganPoint;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        $kategori = KategoriProduk::all();
        $produk = Produk::all();
        $transaksi   = Transaksi::all();
        $pelanggan   = User::where('tipe_user','pelanggan')->get();
        $paling_laris   = TransaksiDetail::select('produk_id',DB::raw('count(*) as jumlah'))->groupBy('produk_id')->orderBy('jumlah','desc')->first();
        $penambahan_point   = PelangganPoint::select(DB::raw('sum(point) as total_point'))->where('status_point','penambahan')->first();
        $pengurangan_point   = PelangganPoint::select(DB::raw('sum(point) as total_point'))->where('status_point','pengurangan')->first();
        return view('admin.dashboard',[
            'kategori' => $kategori,
            'produk' => $produk,
            'transaksi' => $transaksi,
            'pelanggan' => $pelanggan,
            'paling_laris' => $paling_laris,
            'penambahan_point' => $penambahan_point,
            'pengurangan_point' => $pengurangan_point,
        ]);
    }
}
