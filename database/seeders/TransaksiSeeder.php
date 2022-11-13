<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=15 ; $i++) {
            DB::table('transaksis')->insert([
                'pelanggan_id'    =>  1,
                'metode_pembayaran_id'    =>  1,
                'nama_pelanggan'  =>  'Irvan Alfajri',
                'kelurahan'   =>  'Kandang',
                'alamat'  =>  10000,
                'total_belanja'   =>  10000,
                'ongkir'  =>  10000,
                'tambahan'    =>  10000,
                'total_bayar' =>  10000,
                'driver_id'   =>  2,
                'nama_driver' =>  'Driver',
            ]);
        }
    }
}
