<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('jenis_kendaraan', ['mobil', 'motor']);
            $table->string('merk_kendaraan');
            $table->integer('tahun_kendaraan');
            $table->string('bahan_bakar');
            $table->string('nopol');
            $table->date('mulai_iklan');
            $table->date('akhir_iklan');
            $table->integer('harga_iklan');
            $table->integer('harga_sewa');
            $table->string('gambar');
            $table->enum('status',['diajukan','tidak','diproses','diterima','ditolak']);
            $table->unsignedBigInteger('rental_id');
            $table->timestamps();

            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
