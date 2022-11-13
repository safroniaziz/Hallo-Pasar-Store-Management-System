<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganPoint extends Model
{
    use HasFactory;

    public function pelanggan(){
        return $this->belongsTo(User::class);
    }
}
