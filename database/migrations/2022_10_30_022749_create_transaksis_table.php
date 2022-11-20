<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('metode_pembayaran_id');
            $table->string('nama_pelanggan');
            $table->char('village_id')->nullable();
            $table->string('kelurahan');
            $table->string('provinsi')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('alamat');
            $table->string('total');
            $table->string('ongkir');
            $table->string('tambahan');
            $table->unsignedBigInteger('driver_id');
            $table->string('nama_driver');
            $table->timestamps();
            
            $table->foreign('village_id')->references('id')->on('villages');
            $table->foreign('pelanggan_id')->references('id')->on('users');
            $table->foreign('metode_pembayaran_id')->references('id')->on('metode_pembayarans');
            $table->foreign('driver_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
