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
        'total_diskon',
        'total_bayar',
        'driver_id',
        'nama_driver',
        'status_transaksi'
    ];

    public function pelanggan(){
        return $this->belongsTo(User::class,'id');
    }

    public function driver(){
        return $this->belongsTo(User::class,'id');
    }

    public function metode_pembayaran(){
        return $this->belongsTo(MetodePembayaran::class);
    }

    public function transaksi_details(){
        return $this->hasMany(TransaksiDetail::class);
    }
}
