<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * status:
         * (1) aktif
         * (0) tidak aktif
         */
        
        Schema::create('instansi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenis_instansi');
            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->string('no_telp');
            $table->integer('flag_active')->default(1);
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
        Schema::dropIfExists('instansi');
    }
}
