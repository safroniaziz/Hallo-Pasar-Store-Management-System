<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Tag;
use Illuminate\Http\Request;

class GiziProdukController extends Controller
{
    public function index(Produk $produk){
        $tags = Tag::all(); 
        return $tags;
        return view('admin/gizi_produk.index',[
            'produk'    =>  $produk,
        ]);
    }
}
