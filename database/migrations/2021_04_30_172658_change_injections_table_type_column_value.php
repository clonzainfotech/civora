<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeInjectionsTableTypeColumnValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('injections', function (Blueprint $table) {
            DB::statement("UPDATE injections SET type = REPLACE(type, ' +IUI', '')");
            DB::statement("UPDATE injections SET name = REPLACE(name, 'Diva', 'Menogo')");
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
            DB::statement("UPDATE injections SET type = REPLACE(type, ' +IUI', '')");
            DB::statement("UPDATE injections SET name = REPLACE(name, 'Diva', 'Menogo')");
        });
    }
}
