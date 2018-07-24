<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsulan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Flag revisi:
         * (0) Revisi Non Aktif
         * (1) Revisi Aktif
         */

        Schema::table('usulan_kerjasama', function (Blueprint $table) {
            $table->integer('flag_revisi')->after('manfaat')->default(0);
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
