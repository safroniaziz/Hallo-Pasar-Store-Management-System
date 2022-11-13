<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'jenis_kelamin',
        'pekerjaan',
        'tanggal_lahir',
        'village_id',
        'provinsi',
        'kab_kota',
        'kecamatan',
        'kelurahan',
        'alamat',
        'no_hp'
    ];
}
