<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_metode','nomor_rekening','keterangan'
    ];

    public function transaksis(){
        return $this->hasMany(Transaksi::class);
    }
}
