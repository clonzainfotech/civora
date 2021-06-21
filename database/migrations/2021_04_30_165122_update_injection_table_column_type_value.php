<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInjectionTableColumnTypeValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('injections', function (Blueprint $table) {
            DB::statement("UPDATE injections SET type = REPLACE(type, ' + IUI', '')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('injections', function (Blueprint $table) {
            DB::statement("UPDATE injections SET type = REPLACE(type, ' + IUI', '')");
        });
    }
}
