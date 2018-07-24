<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenturaTable extends Migration
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
         * (0) Inactive
         */

        Schema::create('ventura', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('pimpinan');
            $table->text('sejarah');
            $table->text('visi_misi');
            $table->text('deskripsi');
            $table->string('web')->nullable();
            $table->integer('flag')->default(1);
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
        Schema::dropIfExists('ventura');
    }
}
