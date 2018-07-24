<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToDokumenUsulan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Revisi Ke:
         * (0) Dokumen Awal
         * (1) Revisi Ke 1
         * (2) Revisi Ke 2
         * (...) Dst
         */
        
        Schema::table('dokumen_usulan', function (Blueprint $table) {
            $table->integer('revisi_ke')->after('path')->default(0);
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
