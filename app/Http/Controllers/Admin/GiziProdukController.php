<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiziProdukController extends Controller
{
    public function index(Produk $produk){
        $tags = Tag::all(); 
        return view('admin/gizi_produk.index',[
            'produk'    =>  $produk,
            'tags'      =>  $tags,
        ]);
    }

    public function post(Request $request){
        DB::table('produk_tag')->insert([
            'produk_id' =>  $request->produk_id,
            'tag_id'    =>  $request->tag_id,
        ]);

        $notification = array(
            'message' => 'Berhasil, data gizi produk berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.gizi_produk',[$request->produk_id])->with($notification);
    }

    public function destroy(Produk $produk, $id_tag){
        $produk->tags()->detach($id_tag);

        $notification = array(
            'message' => 'Berhasil, data gizi produk berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.gizi_produk',[$produk->id])->with($notification);
    }
}
