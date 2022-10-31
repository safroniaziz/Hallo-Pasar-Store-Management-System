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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->string('nama_produk');
            $table->string('foto_produk');
            $table->string('harga');
            $table->string('diskon');
            $table->string('tambahan');
            $table->string('satuan');
            $table->integer('point');
            $table->string('deskripsi');
            $table->boolean('is_display');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori_produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
