<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJenisPembayaranToLaporanVentura extends Migration
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
         */
        
        Schema::table('laporan_ventura', function (Blueprint $table) {
            $table->integer('jenis_pembayaran')->after('tanggal_selesai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
