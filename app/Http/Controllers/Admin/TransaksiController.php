<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MetodePembayaran;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::orderBy('created_at', 'desc')->get();
        return view('admin/transaksi.index',[
            'transaksis'   => $transaksis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = User::where('tipe_user','driver')->select('id','nama_user')->get();
        $metodes = MetodePembayaran::all();
        $pelanggans = Pelanggan::all();
        return view('admin.transaksi.create',[
            'drivers' =>    $drivers,
            'metodes' =>    $metodes,
            'pelanggans' =>    $pelanggans,
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
            'nama_metode'       =>  'Nama transaksi',
            'keterangan'        =>  'Keterangan',
        ];
        $this->validate($request,[
            'nama_metode' =>  'required',
            'keterangan' =>  'required',
        ],$messages,$attributes);

        Transaksi::create([
            'nama_metode'       =>  $request->nama_metode,
            'nomoe_rekening'    =>  $request->nomoe_rekening,
            'keterangan'        =>  $request->keterangan,
        ]);
        $notification = array(
            'message' => 'Berhasil, data transaksi berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.transaksi')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('admin/transaksi.edit',compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'nama_metode'       =>  'Nama transaksi',
            'keterangan'        =>  'Keterangan',
        ];
        $this->validate($request,[
            'nama_metode' =>  'required',
            'keterangan' =>  'required',
        ],$messages,$attributes);

        $transaksi->update([
            'nama_metode'       =>  $request->nama_metode,
            'nomoe_rekening'    =>  $request->nomoe_rekening,
            'keterangan'        =>  $request->keterangan,
        ]);

        $notification = array(
            'message' => 'Berhasil, data transaksi berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.transaksi')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        $notification = array(
            'message' => 'Berhasil, data transaksi berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.transaksi')->with($notification);
    }
}
