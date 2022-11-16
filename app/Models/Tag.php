<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_tag'
    ];

    public function produks()
    {
        return $this->belongsToMany(Tag::class, 'produk_tag');
    }
}
