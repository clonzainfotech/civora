<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherColumnToAncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anc', function (Blueprint $table) {
            $table->longText('h_o')->nullable();
            $table->longText('c_o')->nullable();
            $table->longText('m_h')->nullable();
            $table->longText('past_history')->nullable();
            $table->longText('o_e')->nullable();
            $table->longText('investigation')->nullable();
            $table->longText('injection')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anc', function (Blueprint $table) {
            $table->dropColumn(['h_o','c_o','m_h','past_history','o_e','investigation','injection']);
        });
    }
}
