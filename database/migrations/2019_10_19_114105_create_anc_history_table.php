<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAncHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anc_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patients_id');
            $table->longText('c_o');
            $table->longText('o_e');
            $table->longText('investigation');
            $table->longText('treatment');
            $table->timestamps();
            $table->foreign('patients_id')->references('id')->on('opd_patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anc_history');
    }
}
