<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelanggan_id',
        'metode_pembayaran_id',
        'nama_pelanggan',
        'kelurahan',
        'alamat',
        'total_belanja',
        'ongkir',
        'tambahan',
        'total_bayar',
        'driver_id',
        'nama_driver',
    ];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }

    public function metode_pembayaran(){
        return $this->belongsTo(MetodePembayaran::class);
    }

    public function transaksi_details(){
        return $this->hasMany(TransaksiDetail::class);
    }
}
