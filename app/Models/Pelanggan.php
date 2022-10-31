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
        'provinsi',
        'kab_kota',
        'kecamatan',
        'kelurahan',
        'alamat',
        'no_hp'
    ];

    public function transaksis(){
        return $this->hasMany(Transaksi::class);
    }

    public function pelanggan_points(){
        return $this->hasMany(PelangganPoint::class);
    }

    public function getPelangganPointAttribute(){
        return $this->pelanggan_points()->sum('point');
    }
}
