<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Carbon\Carbon;

class CreateLaporanVenturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_ventura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ventura');
            $table->integer('id_client');
            $table->string('no_kontrak');
            $table->date('tanggal_laporan');
            $table->string('jenis_kontrak');
            $table->string('nama_pekerjaan');
            $table->string('jenis_penugasan');
            $table->string('lokasi_pekerjaan');
            $table->biginteger('nilai_tanpa_pajak');
            $table->biginteger('nilai_dengan_pajak');
            $table->biginteger('realisasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('jumlah_dosen_terlibat')->default(0);
            $table->integer('jumlah_staf_lembaga_terlibat')->default(0);
            $table->integer('jumlah_konsultan_terlibat')->default(0);
            $table->integer('jumlah_peserta_training')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_ventura');
    }
}
