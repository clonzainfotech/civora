<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDodToIndoorDischargeCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_discharge_cards', function (Blueprint $table) {
            $table->dropColumn(['dod_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_discharge_cards', function (Blueprint $table) {
            $table->date('dod_date')->nullable();
        });
    }
}
