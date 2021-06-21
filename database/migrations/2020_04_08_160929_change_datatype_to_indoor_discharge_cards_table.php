<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDatatypeToIndoorDischargeCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_discharge_cards', function (Blueprint $table) {
            $table->longText('hpe')->change();
            $table->longText('rx_treatment')->change();
            $table->longText('admission_vitals')->change();
            $table->longText('clinical_summary')->change();
            $table->longText('vital_on_discharge')->change();
            $table->longText('cond_on_discharge')->change();
            $table->longText('summary')->change();
            $table->longText('surgical_note')->change();
            $table->longText('report')->change();
            $table->longText('complaints')->change();
            $table->longText('examination')->change();
            $table->longText('diagnosis')->change();
            $table->longText('treatment_given')->change();
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
            $table->text('hpe')->change();
            $table->text('rx_treatment')->change();
            $table->text('admission_vitals')->change();
            $table->text('clinical_summary')->change();
            $table->text('vital_on_discharge')->change();
            $table->text('cond_on_discharge')->change();
            $table->text('summary')->change();
            $table->text('surgical_note')->change();
            $table->text('report')->change();
            $table->text('complaints')->change();
            $table->text('examination')->change();
            $table->text('diagnosis')->change();
            $table->text('treatment_given')->change();
        });
    }
}
