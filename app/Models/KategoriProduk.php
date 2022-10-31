<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori','thumbnail'
    ];

    public function produks(){
        return $this->hasMany(Produk::class);
    }
}
