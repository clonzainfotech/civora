<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCycleNoToIuiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iui', function (Blueprint $table) {
            $table->tinyInteger('cycle_no')->nullable();
            $table->tinyInteger('cycle_status')->default(0)->comment('0=pending,1=active,2=finished');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iui', function (Blueprint $table) {
            $table->dropColumn(['cycle_no','cycle_status']);
        });
    }
}
