<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Province;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class FrontEndController extends Controller
{
    public function index(){
        $kategoris = KategoriProduk::all();
        $rekomendasis = Produk::where('is_paketan',true)->get()->take(3);
        $produks = Produk::with(['kategori'])->where('is_display',true)->select('produks.id','foto_produk','harga','satuan','nama_produk','kategori_id','diskon')
                        ->orderBy('created_at','desc')
                        ->take(12)->get();
        return view('frontend.home',[
            'kategoris' =>  $kategoris,
            'produks' =>  $produks,
            'rekomendasis' =>  $rekomendasis
        ]);
    }

    public function registerUser(){
        $provinces = Province::all();
        return view('auth/register_user',[
            'provinces' =>  $provinces,
        ]);
    }

    public function registerUserPost(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'nama_user'             =>  'Nama Pelanggan',
            'jenis_kelamin'         =>  'Jenis Kelamin',
            'pekerjaan'             =>  'Pekerjaan',
            'tanggal_lahir'         =>  'Tanggal Lahir',
            'provinsi_id'           =>  'Provinsi',
            'kota_id'               =>  'Kabupaten/Kota',
            'kecamatan_id'          =>  'Kecamatan',
            'kelurahan_id'          =>  'Kelurahan',
            'alamat'                =>  'Alamat',
            'no_hp'                 =>  'Nomor Handphone',
            'email'                 =>  'Email',
            'password'              =>  'Password Login',
        ];
        $this->validate($request,[
            'nama_user'             =>  'required',
            'jenis_kelamin'         =>  'required',
            'pekerjaan'             =>  'required',
            'tanggal_lahir'         =>  'required',
            'provinsi_id'           =>  'required',
            'kota_id'               =>  'required',
            'kecamatan_id'          =>  'required',
            'kelurahan_id'          =>  'required',
            'alamat'                =>  'required',
            'no_hp'                 =>  'required',
            'password'              =>  'required',
            'email'                 =>  'required',
        ],$messages,$attributes);

        $kelurahan = Village::findOrFail($request->kelurahan_id);
        User::create([
            'nama_user'             =>  $request->nama_user,
            'jenis_kelamin'         =>  $request->jenis_kelamin,
            'pekerjaan'             =>  $request->pekerjaan,
            'tanggal_lahir'         =>  $request->tanggal_lahir,
            'village_id'            =>  $request->kelurahan_id,
            'provinsi'              =>  $kelurahan->district->regency->province->name,
            'kab_kota'              =>  $kelurahan->district->regency->name,
            'kecamatan'             =>  $kelurahan->district->name,
            'kelurahan'             =>  $kelurahan->name,
            'alamat'                =>  $request->alamat,
            'no_hp'                 =>  $request->no_hp,
            'email'                 =>  $request->email,
            'password'              =>  Hash::make($request->password),
            'tipe_user'             =>  'pelanggan',
        ]);
        return Redirect::to('/login')->with(['success'  =>  'Akun anda sudah terdaftar, silahkan login']);
    }
}
