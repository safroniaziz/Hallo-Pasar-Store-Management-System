<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MetodePembayaran;
use App\Models\PelangganPoint;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
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
        return view('frontend.cart',[
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
            'metode_pembayaran' =>  'required',
        ],$messages,$attributes);
        $transaksi = Transaksi::create([
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
            'ongkir'            =>  $request->ongkir,
            'total_diskon'            =>  $request->total_diskon,
            'tambahan'          =>  $request->total_tambahan,
            'total_bayar'       =>  ($request->total_belanja + $request->tambahan)-$request->total_diskon,
        ]);

        $carts = Cart::where('user_id',Auth::user()->id)->get();
        for ($i=0; $i <count($carts) ; $i++) { 
            TransaksiDetail::create([
                'transaksi_id'  =>  $transaksi->id,
                'produk_id'     =>  $carts[$i]->produk->id,
                'nama_produk'   =>  $carts[$i]->produk->nama_produk,
                'satuan'        =>  $carts[$i]->produk->satuan,
                'jumlah'        =>  $carts[$i]->jumlah,
                'harga'         =>  $carts[$i]->jumlah * $carts[$i]->produk->harga,
                'diskon'         =>  $carts[$i]->jumlah * $carts[$i]->produk->diskon,
                'tambahan'         =>  $carts[$i]->produk->tambahan,
                'poin'         =>  $carts[$i]->jumlah * $carts[$i]->produk->point,
            ]);

            PelangganPoint::create([
                'pelanggan_id'  =>  Auth::user()->id,
                'transaksi_id'  =>  $transaksi->id,
                'point'         =>  $carts[$i]->jumlah * $carts[$i]->produk->point,
                'status_point'  =>  'penambahan',

            ]);
        }
        return redirect()->route('successful');
    }

    public function successful(){
        return view('frontend.successful');
    }

    public function delete(Cart $cart){
        $cart->delete();
        $notification = array(
            'message' => 'Berhasil, '.$cart->produk->nama_produk.' berhasil dihapus dari keranjang!',
            'alert-type' => 'success'
        );
        return redirect()->route('cart')->with($notification);
    }
    
    public function cartUpdate(Request $request){
        $cart = Cart::where('id',$request->id)->first();
        $jumlah = $cart->jumlah+1;
        Cart::where('id',$request->id)->update([
            'jumlah'    =>  $jumlah,
            'total_harga'   =>  $cart->produk->harga * $jumlah,
        ]);

        return response()->json([
            'cart' => $cart,
        ]);
    }

    public function cartUpdateKurangi(Request $request){
        $cart = Cart::where('id',$request->id)->first();
        $jumlah = $cart->jumlah-1;
        Cart::where('id',$request->id)->update([
            'jumlah'    =>  $jumlah,
            'total_harga'   =>  $cart->produk->harga * $jumlah,
        ]);

        return response()->json([
            'cart' => $cart,
        ]);
    }
}
