<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIuiBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iui_bill', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patient_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->integer('cycle_no');
            $table->float('o_study', 8, 2)->unsigned()->nullable(true);
            $table->longText('injections')->nullable(true);
            $table->float('iui', 8, 2)->nullable(true);
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
        Schema::dropIfExists('iui_bill');
    }
}
