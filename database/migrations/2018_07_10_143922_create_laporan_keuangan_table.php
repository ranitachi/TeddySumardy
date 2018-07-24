<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanKeuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Jenis Pembayaran:
         * (1) Tanpa Termin
         * (2) Dengan Termin
         * 
         * Termin:
         * (0) Bayar Sekaligus
         * (1 - dst) Representasi Termin Pembayaran
         */
        
        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_laporan_ventura');
            $table->integer('jenis_pembayaran')->default(1);
            $table->integer('termin')->nullable();
            $table->biginteger('nilai_termin')->nullable();
            $table->biginteger('nilai_kontribusi')->nullable();
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
        Schema::dropIfExists('laporan_keuangan');
    }
}
