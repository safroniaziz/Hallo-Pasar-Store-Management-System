<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        if (!empty($filter)){
            $kecamatans = District::with('regency.villages')
            ->where('name','like','%'.$filter.'%')
            ->orderBy('regency_id')->paginate(10);
        } else
        {
            $kecamatans = District::with('villages')->paginate(10);
        }
        return view('admin/kecamatan.index',[
            'kecamatans'   => $kecamatans,
            'filter' => $filter
        ]);
    }
}
