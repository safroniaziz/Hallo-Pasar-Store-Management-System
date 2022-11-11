<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        if (!empty($filter)){
            $provinces = Province::with('regencies')->where('name','like','%'.$filter.'%')
            ->paginate(10);
        } else
        {
            $provinces = Province::with('regencies')->paginate(10);
        }
        return view('admin/provinsi.index',[
            'provinces'   => $provinces,
            'filter' => $filter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provinsi.create');
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
            'nama_metode'       =>  'Nama Metode Pembayaran',
            'keterangan'        =>  'Keterangan',
        ];
        $this->validate($request,[
            'nama_metode' =>  'required',
            'keterangan' =>  'required',
        ],$messages,$attributes);

        MetodePembayaran::create([
            'nama_metode'       =>  $request->nama_metode,
            'nomor_rekening'    =>  $request->nomor_rekening,
            'keterangan'        =>  $request->keterangan,
        ]);
        $notification = array(
            'message' => 'Berhasil, data metode pembayaran berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.metode')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(MetodePembayaran $metodePembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(MetodePembayaran $metodePembayaran)
    {
        return view('admin/provinsi.edit',compact('metodePembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetodePembayaran $metodePembayaran)
    {
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'nama_metode'       =>  'Nama Metode Pembayaran',
            'keterangan'        =>  'Keterangan',
        ];
        $this->validate($request,[
            'nama_metode' =>  'required',
            'keterangan' =>  'required',
        ],$messages,$attributes);

        $metodePembayaran->update([
            'nama_metode'       =>  $request->nama_metode,
            'nomor_rekening'    =>  $request->nomor_rekening,
            'keterangan'        =>  $request->keterangan,
        ]);

        $notification = array(
            'message' => 'Berhasil, data metode pembayaran berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.metode')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetodePembayaran $metodePembayaran)
    {
        $metodePembayaran->delete();
        $notification = array(
            'message' => 'Berhasil, data metode pembayaran berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.metode')->with($notification);
    }
}
