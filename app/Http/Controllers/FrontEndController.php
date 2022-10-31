<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $kategoris = KategoriProduk::all();
        $paketans = Produk::where('is_paketan',true)->select('foto_produk')->get();
        $rekomendasis = Produk::where('is_paketan',true)->get()->take(3);
        $produks = Produk::with(['kategori'])->where('is_display',true)->select('foto_produk','harga','satuan','nama_produk','kategori_id')->get();
        return view('frontend.home',[
            'kategoris' =>  $kategoris,
            'paketans' =>  $paketans,
            'produks' =>  $produks,
            'rekomendasis' =>  $rekomendasis
        ]);
    }
}
