<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\MetodePembayaran;
use App\Models\Pelanggan;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
        $transaksis = Transaksi::select(
                'transaksis.id',
                'transaksis.nama_pelanggan',
                'transaksis.alamat',
                'transaksis.total_bayar',
                'transaksis.pelanggan_id',
            )
            ->with(['pelanggan']);

            return DataTables::of($transaksis)
            ->addColumn('action',function($data){
                $url_edit = url('admin/transaksi/'.$data->id.'/edit');
                $url_hapus = url('admin/transaksi/'.$data->id.'/delete');
                $button = '<a href="'.$url_edit.'" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp;Edit</a>';
                $button .= '<a href="'.$url_hapus.'" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i>&nbsp;Hapus</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()

                ->make(true);
        }
        return view('admin/transaksi.index');
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
        $provinces = Province::all();
        return view('admin.transaksi.create',[
            'drivers' =>    $drivers,
            'metodes' =>    $metodes,
            'pelanggans' =>    $pelanggans,
            'provinces' =>    $provinces,
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
            'pelanggan_id'          =>  'Nama Pelanggan',
            'metode_pembayaran_id'  =>  'Metode Pembayaran',
            'kelurahan_id'          =>  'Kelurahan',
            'alamat'                =>  'Alamat',
            'total_belanja'         =>  'Total Belanja',
            'ongkir'                =>  'Ongkos Kirim',
            'tambahan'              =>  'Biaya Tambahan',
            'driver_id'             =>  'Nama Driver',
        ];
        $this->validate($request,[
            'pelanggan_id'          =>  'required',
            'metode_pembayaran_id'  =>  'required',
            'kelurahan_id'          =>  'required',
            'alamat'                =>  'required',
            'total_belanja'         =>  'required',
            'ongkir'                =>  'required',
            'tambahan'              =>  'required',
            'driver_id'             =>  'required',
        ],$messages,$attributes);

        $pelanggan =  Pelanggan::where('id',$request->pelanggan_id)->first();
        $kelurahan =  Village::where('id',$request->kelurahan_id)->first();
        $total_bayar = $request->total_belanja + $request->ongkir + $request->tambahan;
        $driver = User::where('id',$request->driver_id)->select('nama_user')->first();
        Transaksi::create([
            'pelanggan_id'          =>  $request->pelanggan_id,
            'nama_pelanggan'        =>  $pelanggan->nama_pelanggan,
            'metode_pembayaran_id'  =>  $request->metode_pembayaran_id,
            'kelurahan'             =>  $kelurahan->name,
            'alamat'                =>  $request->alamat,
            'total_belanja'         =>  $request->total_belanja,
            'ongkir'                =>  $request->ongkir,
            'tambahan'              =>  $request->tambahan,
            'driver_id'             =>  $request->driver_id,
            'total_bayar'           =>  $total_bayar,
            'nama_driver'           =>  $driver->nama_user,
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
        $drivers = User::where('tipe_user','driver')->select('id','nama_user')->get();
        $metodes = MetodePembayaran::all();
        $pelanggans = Pelanggan::all();
        $provinces = Province::all();
        return view('admin.transaksi.edit',[
            'drivers' =>    $drivers,
            'metodes' =>    $metodes,
            'pelanggans' =>    $pelanggans,
            'provinces' =>    $provinces,
            'transaksi' =>    $transaksi,
        ]);

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
            'pelanggan_id'          =>  'Nama Pelanggan',
            'metode_pembayaran_id'  =>  'Metode Pembayaran',
            'kelurahan_id'          =>  'Kelurahan',
            'alamat'                =>  'Alamat',
            'total_belanja'         =>  'Total Belanja',
            'ongkir'                =>  'Ongkos Kirim',
            'tambahan'              =>  'Biaya Tambahan',
            'driver_id'             =>  'Nama Driver',
        ];
        $this->validate($request,[
            'pelanggan_id'          =>  'required',
            'metode_pembayaran_id'  =>  'required',
            'kelurahan_id'          =>  'required',
            'alamat'                =>  'required',
            'total_belanja'         =>  'required',
            'ongkir'                =>  'required',
            'tambahan'              =>  'required',
            'driver_id'             =>  'required',
        ],$messages,$attributes);

        $pelanggan =  Pelanggan::where('id',$request->pelanggan_id)->first();
        $kelurahan =  Village::where('id',$request->kelurahan_id)->first();
        $total_bayar = $request->total_belanja + $request->ongkir + $request->tambahan;
        $driver = User::where('id',$request->driver_id)->select('nama_user')->first();
        $transaksi::create([
            'pelanggan_id'          =>  $request->pelanggan_id,
            'nama_pelanggan'        =>  $pelanggan->nama_pelanggan,
            'metode_pembayaran_id'  =>  $request->metode_pembayaran_id,
            'kelurahan'             =>  $kelurahan->name,
            'alamat'                =>  $request->alamat,
            'total_belanja'         =>  $request->total_belanja,
            'ongkir'                =>  $request->ongkir,
            'tambahan'              =>  $request->tambahan,
            'driver_id'             =>  $request->driver_id,
            'total_bayar'           =>  $total_bayar,
            'nama_driver'           =>  $driver->nama_user,
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

    public function cariKota(Request $request){
        return Regency::where('province_id',$request->provinsi_id)->get();
    }

    public function cariKecamatan(Request $request){
        return District::where('regency_id',$request->kota_id)->get();
    }

    public function cariKelurahan(Request $request){
        return Village::where('district_id',$request->kecamatan_id)->get();
    }

    public function cariOngkir(Request $request){
        return Village::where('id',$request->kelurahan_id)->select('ongkir')->first();
    }
}
