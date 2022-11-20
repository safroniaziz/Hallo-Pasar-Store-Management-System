<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
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
            'total_harga'   =>  $harga * $request->quantity
        ]);
        return response()->json([
            'success' => true,
        ]);
    }

    public function cart(){
        $rekomendasis = Produk::where('is_paketan',true)->get()->take(3);
        return view('cart',[
            'rekomendasis'   =>  $rekomendasis
        ]);
    }
}
