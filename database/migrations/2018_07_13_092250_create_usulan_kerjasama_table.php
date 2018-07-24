<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsulanKerjasamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Lokasi:
         * (1) Dalam Negeri
         * (2) Luar Negeri
         */

        Schema::create('usulan_kerjasama', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sifat_kerjasama');
            $table->integer('id_status_usulan')->nullable(); // id status usulan terakhir..
            $table->string('nama_pengusul');
            $table->string('no_telp');
            $table->string('email');
            $table->string('instansi');
            $table->string('jenis_kegiatan');
            $table->integer('lokasi');
            $table->text('manfaat');
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
        Schema::dropIfExists('usulan_kerjasama');
    }
}
