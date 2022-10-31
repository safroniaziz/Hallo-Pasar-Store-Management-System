<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::orderBy('created_at', 'desc')->get();
        return view('admin/pelanggan.index',[
            'pelanggans'   => $pelanggans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelanggan.create');
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
            'nama_pelanggan'    =>  'Nama Pelanggan',
            'jenis_kelamin'     =>  'Jenis Kelamin',
            'pekerjaan'         =>  'Pekerjaan',
            'tanggal_lahir'     =>  'Tanggal Lahir',
            'provinsi'          =>  'Provinsi',
            'kab_kota'          =>  'Kabupaten/Kota',
            'kecamatan'         =>  'Kecamatan',
            'kelurahan'         =>  'Kelurahan',
            'alamat'            =>  'Alamat',
            'no_hp'             =>   'Nomor Handphone',
        ];
        $this->validate($request,[
            'nama_pelanggan'    =>  'required',
            'jenis_kelamin'     =>  'required',
            'pekerjaan'         =>  'required',
            'tanggal_lahir'     =>  'required',
            'provinsi'          =>  'required',
            'kab_kota'          =>  'required',
            'kecamatan'         =>  'required',
            'kelurahan'         =>  'required',
            'alamat'            =>  'required',
        ],$messages,$attributes);

        Pelanggan::create([
            'nama_pelanggan'       =>  $request->nama_pelanggan,
            'jenis_kelamin'    =>  $request->jenis_kelamin,
            'pekerjaan'        =>  $request->pekerjaan,
            'tanggal_lahir'        =>  $request->tanggal_lahir,
            'provinsi'        =>  $request->provinsi,
            'kab_kota'        =>  $request->kab_kota,
            'kecamatan'        =>  $request->kecamatan,
            'kelurahan'        =>  $request->kelurahan,
            'alamat'        =>  $request->alamat,
            'no_hp'         =>  $request->no_hp,
        ]);
        $notification = array(
            'message' => 'Berhasil, data pelanggan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pelanggan')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(pelanggan $pelanggan)
    {
        return view('admin/pelanggan.show',compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(pelanggan $pelanggan)
    {
        return view('admin/pelanggan.edit',compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pelanggan $pelanggan)
    {
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'nama_pelanggan'    =>  'Nama Pelanggan',
            'jenis_kelamin'     =>  'Jenis Kelamin',
            'pekerjaan'         =>  'Pekerjaan',
            'tanggal_lahir'     =>  'Tanggal Lahir',
            'provinsi'          =>  'Provinsi',
            'kab_kota'          =>  'Kabupaten/Kota',
            'kecamatan'         =>  'Kecamatan',
            'kelurahan'         =>  'Kelurahan',
            'alamat'            =>  'Alamat',
            'no_hp'             =>  'Nomor Handphone',
        ];
        $this->validate($request,[
            'nama_pelanggan'    =>  'required',
            'jenis_kelamin'     =>  'required',
            'pekerjaan'         =>  'required',
            'tanggal_lahir'     =>  'required',
            'provinsi'          =>  'required',
            'kab_kota'          =>  'required',
            'kecamatan'         =>  'required',
            'kelurahan'         =>  'required',
            'alamat'            =>  'required',
        ],$messages,$attributes);

        $pelanggan->update([
            'nama_pelanggan'       =>  $request->nama_pelanggan,
            'jenis_kelamin'    =>  $request->jenis_kelamin,
            'pekerjaan'        =>  $request->pekerjaan,
            'tanggal_lahir'        =>  $request->tanggal_lahir,
            'provinsi'        =>  $request->provinsi,
            'kab_kota'        =>  $request->kab_kota,
            'kecamatan'        =>  $request->kecamatan,
            'kelurahan'        =>  $request->kelurahan,
            'alamat'        =>  $request->alamat,
            'no_hp'        =>  $request->no_hp,
        ]);

        $notification = array(
            'message' => 'Berhasil, data pelanggan berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pelanggan')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pelanggan $pelanggan)
    {
        $pelanggan->delete();
        $notification = array(
            'message' => 'Berhasil, data pelanggan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pelanggan')->with($notification);
    }
}
