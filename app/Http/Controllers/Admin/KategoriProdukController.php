<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = KategoriProduk::orderBy('created_at', 'DESC')->get();
        return view('admin/kategori_produk.index',[
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_produk.create');
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
            'image' => ':attribute harus berupa gambar',
        ];
        $attributes = [
            'nama_kategori'    =>  'Nama Kategori',
            'thumbnail'    =>  'Thumbnail',
        ];
        $this->validate($request,[
            'nama_kategori' =>  'required',
            'thumbnail' =>  'required',
        ],$messages,$attributes);
        DB::beginTransaction();
        try {
            $slug_name = Str::slug($request->nama_kategori);
            $model['thumbnail'] = 'gambar_kategori'.'-'.$slug_name.'-'.md5(uniqid(rand(), true)).'.'.'png';
            $data = $request->thumbnail;
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $url = public_path().'/upload/gambar_kategori';
            file_put_contents($url.'/'.$model['thumbnail'],$data);
            $upload = KategoriProduk::create([
                'nama_kategori' =>  $request->nama_kategori,
                'thumbnail' =>  $model['thumbnail'],
            ]);
            DB::commit();
                return response()->json([
                    'success' => true,
                ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriProduk $kategoriProduk)
    {
        return view('admin/kategori_produk.edit',compact('kategoriProduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        $messages = [
            'required' => ':attribute harus diisi',
            'image' => ':attribute harus berupa gambar',
        ];
        $attributes = [
            'nama_kategori'    =>  'Nama Kategori',
            'thumbnail'    =>  'Thumbnail',
        ];
        $this->validate($request,[
            'nama_kategori' =>  'required',
            'thumbnail'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000',
        ],$messages,$attributes);
        DB::beginTransaction();
        try {
            $model = $request->all();
            $model['thumbnail'] = null;
            $slug_name = Str::slug($request->nama_kategori);
            $thumbnail =  $kategoriProduk;
            $array = [
                'nama_kategori'     => $request->nama_kategori,
            ];

            if ($request->hasFile('thumbnail')){
                if (!$thumbnail->thumbnail == NULL){
                    unlink(public_path('/upload/gambar_kategori/'.$thumbnail->thumbnail));
                }
                $model['thumbnail'] = 'gambar_kategori'.'-'.$slug_name.'-'.md5(uniqid(rand(), true)).'.'.$request->thumbnail->getClientOriginalExtension();
                $request->thumbnail->move(public_path('/upload/gambar_kategori/'), $model['thumbnail']);
                $array['thumbnail'  ]  =  $model['thumbnail'];
            }else{
                if ($thumbnail->thumbnail == null) {
                    $notification = array(
                        'message' => 'Gagal, gambar tidak boleh kosong !',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }

            $kategoriProduk->update($array);

            DB::commit();
            $notification = array(
                'message' => 'Berhasil, data kategori produk berhasil diubah!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.kategori_produk')->with($notification);
        } catch (\Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Gagal, data kategori produk gagal diubah!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.kategori_produk')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriProduk $kategoriProduk)
    {
        DB::beginTransaction();
        try {
            if (!$kategoriProduk->thumbnail == NULL){
                unlink(public_path('/upload/gambar_kategori/'.$kategoriProduk->thumbnail));
            }
            $kategoriProduk->delete();
            DB::commit();
            $notification = array(
                'message' => 'Berhasil, data kategori produk berhasil dihapus!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.kategori_produk')->with($notification);

        } catch (\Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Gagal, data kategori produk gagal diubah!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.kategori_produk')->with($notification);
        }
    }
}
