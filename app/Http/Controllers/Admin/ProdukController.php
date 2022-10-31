<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FotoProduk;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin/produk.index',[
            'produks' => $produks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = KategoriProduk::all();
        return view('admin.produk.create',[
            'kategoris' => $kategoris,
        ]);
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
            'kategori_id'       =>  'Kategori',
            'nama_produk'       =>  'Nama Produk',
            'foto_produk'       =>  'Thumbnail Produk',
            'harga'             =>  'Harga',
            'diskon'            =>  'Diskon',
            'tambahan'          =>  'Tambahan Biaya',
            'satuan'            =>  'Satuan',
            'point'              =>  'Point',
            'deskripsi'         =>  'Deskripsi',
        ];
        $this->validate($request,[
            'kategori_id'   =>  'required',
            'nama_produk'   =>  'required',
            'foto_produk'   =>  'image|mimes:jpeg,png,jpg,gif,svg',
            'harga'         =>  'required',
            'diskon'        =>  'required',
            'tambahan'      =>  'required',
            'satuan'        =>  'required',
            'point'         =>  'required',
            'deskripsi'     =>  'required',
        ],$messages,$attributes);
        DB::beginTransaction();
        try {
            $slug_name = Str::slug($request->nama_produk);
            $model['foto_produk'] = null;
            if ($request->hasFile('foto_produk')) {
                $model['foto_produk'] = 'foto_produk'.'-'.$slug_name.'-'.md5(uniqid(rand(), true)).'.'.$request->foto_produk->getClientOriginalExtension();
                $request->foto_produk->move(public_path('/upload/foto_produk/'), $model['foto_produk']);
            }

            $array = [
                'nama_kategori' =>  $request->nama_kategori,
                'kategori_id'   =>  $request->kategori_id,
                'nama_produk'   =>  $request->nama_produk,
                'foto_produk'   =>  $model['foto_produk'],
                'harga'         =>  $request->harga,
                'diskon'        =>  $request->diskon,
                'tambahan'      =>  $request->tambahan,
                'satuan'        =>  $request->satuan,
                'point'         =>  $request->point,
                'deskripsi'     =>  $request->deskripsi,
            ];
            if ($request->has('is_display')){
                $array['is_display']  =  true;
            }else{
                $array['is_display']  =  false;
            }

            if ($request->has('is_paketan')){
                $array['is_paketan']  =  true;
            }else{
                $array['is_paketan']  =  false;
            }
            Produk::create($array);

            DB::commit();
            $notification = array(
                'message' => 'Berhasil, data produk berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.produk')->with($notification);
        } catch (\Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Gagal, data produk gagal diubah!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.produk')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('admin/produk.show',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategoris = KategoriProduk::all();
        return view('admin/produk.edit',compact('kategoris','produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'kategori_id'       =>  'Kategori',
            'nama_produk'       =>  'Nama Produk',
            'foto_produk'       =>  'Thumbnail Produk',
            'harga'             =>  'Harga',
            'diskon'            =>  'Diskon',
            'tambahan'          =>  'Tambahan Biaya',
            'satuan'            =>  'Satuan',
            'point'              =>  'Point',
            'deskripsi'         =>  'Deskripsi',
        ];
        $this->validate($request,[
            'kategori_id'   =>  'required',
            'nama_produk'   =>  'required',
            'foto_produk'   =>  'image|mimes:jpeg,png,jpg,gif,svg',
            'harga'         =>  'required',
            'diskon'        =>  'required',
            'tambahan'      =>  'required',
            'satuan'        =>  'required',
            'point'         =>  'required',
            'deskripsi'     =>  'required',
        ],$messages,$attributes);
        DB::beginTransaction();
        try {
            $model = $request->all();
            $model['foto_produk'] = null;
            $slug_name = Str::slug($request->nama_kategori);
            $foto_produk =  $produk;
            $array = [
                'nama_kategori'     =>  $request->nama_kategori,
                'kategori_id'       =>  $request->kategori_id,
                'nama_produk'       =>  $request->nama_produk,
                'harga'             =>  $request->harga,
                'diskon'            =>  $request->diskon,
                'tambahan'          =>  $request->tambahan,
                'satuan'            =>  $request->satuan,
                'point'             =>  $request->point,
                'deskripsi'         =>  $request->deskripsi,
            ];

            if ($request->has('is_display')){
                $array['is_display']  =  true;
            }else{
                $array['is_display']  =  false;
            }

            if ($request->hasFile('foto_produk')){
                if (!$foto_produk->foto_produk == NULL){
                    unlink(public_path('/upload/foto_produk/'.$foto_produk->foto_produk));
                }
                $model['foto_produk'] = 'foto_produk'.'-'.$slug_name.'-'.md5(uniqid(rand(), true)).'.'.$request->foto_produk->getClientOriginalExtension();
                $request->foto_produk->move(public_path('/upload/foto_produk/'), $model['foto_produk']);
                $array['foto_produk'  ]  =  $model['foto_produk'];
            }else{
                if ($foto_produk->foto_produk == null) {
                    $notification = array(
                        'message' => 'Gagal, gambar tidak boleh kosong !',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }

            $produk->update($array);

            DB::commit();
            $notification = array(
                'message' => 'Berhasil, data produk berhasil diubah!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.produk')->with($notification);
        } catch (\Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Gagal, data produk gagal diubah!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.produk')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        $notification = array(
            'message' => 'Berhasil, data produk berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.produk')->with($notification);
    }

    public function fotoStore(Request $request, Produk $produk){
        $messages = [
            'image' => ':attribute harus berupa gambar',
        ];
        $attributes = [
            'foto_produk'    =>  'Foto Produk',
        ];
        $this->validate($request,[
            'foto_produk'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$messages,$attributes);
        DB::beginTransaction();
        try {
            $slug_name = Str::slug($request->nama_kategori);
            $model['foto_produk'] = null;
            if ($request->hasFile('foto_produk')) {
                $model['foto_produk'] = 'foto_produk_detail'.'-'.$slug_name.'-'.md5(uniqid(rand(), true)).'.'.$request->foto_produk->getClientOriginalExtension();
                $request->foto_produk->move(public_path('/upload/foto_produk_detail/'), $model['foto_produk']);
            }

            FotoProduk::create([
                'produk_id' =>  $produk->id,
                'foto_produk' =>  $model['foto_produk'],
            ]);
            DB::commit();
            $notification = array(
                'message' => 'Berhasil, foto produk berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.produk.show',[$produk->id])->with($notification);
        } catch (\Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Gagal, foto produk gagal ditambahkan!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.produk.show',[$produk->id])->with($notification);
        }
    }

    public function fotoDestroy(FotoProduk $fotoProduk)
    {
        DB::beginTransaction();
        try {
            if (!$fotoProduk->foto_produk == NULL){
                unlink(public_path('/upload/foto_produk_detail/'.$fotoProduk->foto_produk));
            }
            $fotoProduk->delete();

            DB::commit();
            $notification = array(
                'message' => 'Berhasil, data produk berhasil dihapus!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.produk.show',[$fotoProduk->produk_id])->with($notification);
        } catch (\Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Gagal, foto produk gagal ditambahkan!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.produk.show',[$fotoProduk->produk_id])->with($notification);
        }
    }
}
