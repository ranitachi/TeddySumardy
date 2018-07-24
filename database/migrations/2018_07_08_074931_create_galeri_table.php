<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Type:
         * (1) Foto
         * (2) Video
         */

        Schema::create('galeri', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->text('file')->nullable();
            $table->text('url')->nullable();
            $table->integer('type');
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
        Schema::dropIfExists('galeri');
    }
}
