<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index(Request $request, District $kecamatan)
    {
        $filter = $request->query('filter');
        if (!empty($filter)){
            $kelurahans = Village::where('district_id',$kecamatan->id)
            ->where('name','like','%'.$filter.'%')->paginate(10);
        } else
        {
            $kelurahans = Village::where('district_id',$kecamatan->id)->paginate(10);
        }
        return view('admin/kelurahan.index',[
            'kelurahans'   => $kelurahans,
            'kecamatan'   => $kecamatan,
            'filter' => $filter
        ]);
    }

    public function update(Request $request, District $kecamatan, Village $kelurahan){
        $kelurahan->update([
            'ongkir'    =>  $request->ongkir,
        ]);

        $notification = array(
            'message' => 'Berhasil, ongkir berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.kelurahan',[$kecamatan])->with($notification);
    }
}
