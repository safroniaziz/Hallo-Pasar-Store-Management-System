<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }

    public function metode_pembyaran(){
        return $this->belongsTo(MetodePembayaran::class);
    }

    public function transaksi_details(){
        return $this->hasMany(TransaksiDetail::class);
    }
}
