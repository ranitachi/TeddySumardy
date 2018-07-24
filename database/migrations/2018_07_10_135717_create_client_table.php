<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Flag:
         * (1) Active
         * (2) Inactive
         */
        
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenis_instansi');
            $table->string('nama');
            $table->text('alamat');
            $table->string('telp');
            $table->integer('flag')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
