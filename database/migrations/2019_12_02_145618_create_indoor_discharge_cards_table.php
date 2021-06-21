<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndoorDischargeCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indoor_discharge_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('booking_id');
            $table->date('dos_date');
            $table->string('diagnosis')->nullable();
            $table->string('treatment_given')->nullable();
            $table->string('hpe')->nullable();
            $table->string('rx_treatment')->nullable();
            $table->string('admission_vitals')->nullable();
            $table->string('clinical_summary')->nullable();
            $table->string('vital_on_discharge')->nullable();
            $table->string('cond_on_discharge')->nullable();
            $table->string('summary')->nullable();
            $table->string('surgical_note')->nullable();
            $table->string('report')->nullable();
            $table->string('complaints')->nullable();
            $table->string('examination')->nullable();
            $table->string('follow_up')->nullable();
            $table->date('followup_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indoor_discharge_cards');
    }
}
