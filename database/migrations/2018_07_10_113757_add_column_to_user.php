<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUser extends Migration
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
        
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id_ventura')->nullable()->after('level');
            $table->integer('flag')->default(1)->after('id_ventura');
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
