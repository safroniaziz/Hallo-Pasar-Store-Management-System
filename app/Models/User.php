<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
        
    protected $fillable = [
        'nama_user',
        'email',
        'jenis_kelamin',
        'pekerjaan',
        'tanggal_lahir',
        'village_id',
        'provinsi',
        'kab_kota',
        'kecamatan',
        'kelurahan',
        'alamat',
        'no_hp',
        'password',
        'tipe_user',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaksis(){
        return $this->hasMany(Transaksi::class);
    }

    public function pelanggan_points(){
        return $this->hasMany(PelangganPoint::class,'pelanggan_id');
    }

    public function getPelangganPointAttribute(){
        return $this->pelanggan_points()->sum('point');
    }

    public function village(){
        return $this->belongsTo(Village::class);
    }
}
