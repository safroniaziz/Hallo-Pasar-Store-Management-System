<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'DESC')->get();
        return view('admin/tag.index',[
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'nama_tag'    =>  'Kandungan Gizi',
        ];
        $this->validate($request,[
            'nama_tag' =>  'required',
        ],$messages,$attributes);
      
        Tag::create([
            'nama_tag'  =>  $request->nama_tag,
        ]);
        $notification = array(
            'message' => 'Berhasil, kandungan gizi berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.tag')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tagProduk)
    {
        $tagProduk->delete();
        $notification = array(
            'message' => 'Berhasil, data kandungan gizi berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.tag')->with($notification);
    }
}
