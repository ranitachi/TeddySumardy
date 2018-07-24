<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
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
         * (1) Sejarah
         * (2) Tugas Fungsi
         * (3) Struktur Organisasi
         * (4) Visi Misi
         * (5) Hubungi Kami
         */

        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('konten');
            $table->integer('type');
            $table->integer('author_id');
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
        Schema::dropIfExists('profile');
    }
}
