<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeProdukController extends Controller
{
    public function produks(){
        $produks = Produk::orderBy('created_at','desc')->paginate(12);
        return view('frontend/produks.index',[
            'produks'   =>  $produks
        ]);
    }

    public function produkDetail(Produk $produk){
        $produks = Produk::orderBy('created_at','desc')->where('is_paketan',1)->take(4)->get();
        return view('frontend.produks.detail',[
            'produk'    =>  $produk,
            'produks'    =>  $produks,
        ]);
    }

    public function kategoriDetail(KategoriProduk $kategoriProduk){
        $produks = Produk::where('kategori_id',$kategoriProduk->id)->paginate(12);
        return view('frontend.produks.kategori_detail',[
            'produks'    =>  $produks,
        ]);
    }
}
