<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\User;
use App\Models\Village;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = User::where('tipe_user','operator')->orderBy('created_at','desc')->get();
        return view('admin/operator.index',[
            'operators'  =>  $operators,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        return view('admin/operator.create',[
            'provinces'  =>  $provinces,
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
            'nama_user'             =>  'Nama Operator',
            'jenis_kelamin'         =>  'Jenis Kelamin',
            'pekerjaan'             =>  'Pekerjaan',
            'tanggal_lahir'         =>  'Tanggal Lahir',
            'provinsi_id'           =>  'Provinsi',
            'kota_id'               =>  'Kabupaten/Kota',
            'kecamatan_id'          =>  'Kecamatan',
            'kelurahan_id'          =>  'Kelurahan',
            'alamat'                =>  'Alamat',
            'no_hp'                 =>   'Nomor Handphone',
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
            'email'                 =>  'required',
            'password'              =>  'required',
        ],$messages,$attributes);
        DB::beginTransaction();
        try {
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
                'password'              =>  bcrypt($request->password),
                'tipe_user'             =>  'operator',
            ]);
            DB::commit();
            $notification = array(
                'message' => 'Berhasil, data operator berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.operator')->with($notification);
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Gagal, data operator gagal ditambahkan!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.operator')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $operator)
    {
        $provinces = Province::all();
        return view('admin/operator.edit',[
            'provinces'  =>  $provinces,
            'operator'  =>  $operator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $operator)
    {
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'nama_user'             =>  'Nama Operator',
            'jenis_kelamin'         =>  'Jenis Kelamin',
            'pekerjaan'             =>  'Pekerjaan',
            'tanggal_lahir'         =>  'Tanggal Lahir',
            'alamat'                =>  'Alamat',
            'no_hp'                 =>   'Nomor Handphone',
            'email'                 =>  'Email',
        ];
        $this->validate($request,[
            'nama_user'             =>  'required',
            'jenis_kelamin'         =>  'required',
            'pekerjaan'             =>  'required',
            'tanggal_lahir'         =>  'required',
            'alamat'                =>  'required',
            'no_hp'                 =>  'required',
            'email'                 =>  'required',
        ],$messages,$attributes);
        DB::beginTransaction();
        try {
            $array = [
                'nama_user'             =>  $request->nama_user,
                'jenis_kelamin'         =>  $request->jenis_kelamin,
                'pekerjaan'             =>  $request->pekerjaan,
                'tanggal_lahir'         =>  $request->tanggal_lahir,
                'alamat'                =>  $request->alamat,
                'no_hp'                 =>  $request->no_hp,
                'email'                 =>  $request->email,
            ];
            if (isset($request->kelurahan_id)) {
                $kelurahan = Village::findOrFail($request->kelurahan_id);
                $array['provinsi']      =  $kelurahan->district->regency->province->name;
                $array['kab_kota']      =  $kelurahan->district->regency->name;
                $array['kecamatan']     =  $kelurahan->district->name;
                $array['kelurahan']     =  $kelurahan->name;
                $array['village_id']     =  $request->kelurahan_id;
            }
            $operator->update($array);

            DB::commit();
            $notification = array(
                'message' => 'Berhasil, data operator berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.operator')->with($notification);
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Gagal, data operator gagal ditambahkan!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.operator')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $operator)
    {
        $operator->delete();
        $notification = array(
            'message' => 'Berhasil, data operator berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.operator')->with($notification);
    }
}
