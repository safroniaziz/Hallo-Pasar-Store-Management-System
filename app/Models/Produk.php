<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'nama_produk',
        'foto_produk',
        'harga',
        'diskon',
        'tambahan',
        'satuan',
        'point',
        'deskripsi',
        'is_display',
        'is_paketan',
    ];

    public function kategori(){
        return $this->belongsTo(KategoriProduk::class);
    }

    public function transaksi_details(){
        return $this->hasMany(TransaksiDetail::class);
    }

    public function photos(){
        return $this->hasMany(FotoProduk::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'produk_tag');
    }
}
