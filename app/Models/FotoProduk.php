<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'produk_id','foto_produk'
    ];

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
