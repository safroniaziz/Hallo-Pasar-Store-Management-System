<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MetodePembayaran;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function post(Request $request){
        $produk = Produk::where('id',$request->produk_id)->first();
        $harga  = ($produk->harga + $produk->tambahan) - $produk->diskon;
        // return $request->produk_id;
        Cart::create([
            'produk_id' =>  $request->produk_id,
            'jumlah'    =>  $request->quantity,
            'user_id'   =>  Auth::user()->id,
            'total_harga'   =>  $harga * $request->quantity,
            'total_diskon'   =>  $produk->diskon,
            'total_tambahan'   =>  $produk->tambahan,
        ]);
        return response()->json([
            'success' => true,
        ]);
    }

    public function cart(){
        $rekomendasis = Produk::where('is_paketan',true)->get()->take(3);
        $metodes = MetodePembayaran::all();
        return view('cart',[
            'rekomendasis'   =>  $rekomendasis,
            'metodes'   =>  $metodes,
        ]);
    }

    public function cariMetode(Request $request){
        return MetodePembayaran::findOrFail($request->metode_pembayaran);
    }

    public function cartTransaksi(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'metode_pembayaran'       =>  'Metode Pembayaran',
        ];
        $this->validate($request,[
            'nama_metode' =>  'required',
            'keterangan' =>  'required',
        ],$messages,$attributes);
        Transaksi::create([
            'pelanggan_id'  =>  Auth::user()->id,
            'metode_pembayaran_id'  =>  $request->metode_pembayaran,
            'nama_pelanggan'    =>  Auth::user()->nama_user,
            'village_id'        =>  Auth::user()->village_id,
            'kelurahan'         =>  Auth::user()->kelurahan,
            'provinsi'          =>  Auth::user()->provinsi,
            'kab_kota'          =>  Auth::user()->kab_kota,
            'kecamatan'         =>  Auth::user()->kecamatan,
            'alamat'            =>  Auth::user()->alamat,
            'total_belanja'     =>  $request->total_belanja,
            'ongkir'            =>  $request->total_ongkir,
            'total_diskon'            =>  $request->total_diskon,
            'tambahan'          =>  $request->tambahan,
            'total_bayar'       =>  ($request->total_belanja + $request->tambahan)-$request->total_diskon,
        ]);


    }
}
