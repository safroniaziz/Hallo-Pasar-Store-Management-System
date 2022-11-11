<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Regency;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        if (!empty($filter)){
            $kotas = Regency::with('province.districts')
            ->where('name','like','%'.$filter.'%')
            ->orderBy('province_id')->paginate(10);
        } else
        {
            $kotas = Regency::with('districts')->paginate(10);
        }
        return view('admin/kota.index',[
            'kotas'   => $kotas,
            'filter' => $filter
        ]);
    }
}
