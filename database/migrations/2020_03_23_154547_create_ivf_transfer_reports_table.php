<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIvfTransferReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ivf_transfer_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patient_id')->unsigned();
            $table->integer('cycle_no');
            $table->tinyInteger('plan')->comment('1=Pick Up, 2=FET, 3=FET-OD, 4=FET-ED');
            $table->integer('visit_no');
            $table->string('indication')->nullable(true);
            $table->date('et_date')->nullable(true);
            $table->string('day')->nullable(true);
            $table->string('endo_thickness')->nullable(true);
            $table->string('et_procedure')->nullable(true);
            $table->string('embryos_transferred')->nullable(true);
            $table->string('frozen_embryos')->nullable(true);
            $table->date('pickup_date')->nullable(true);
            $table->string('simulation_protocol')->nullable(true);
            $table->integer('total_occ')->nullable(true);
            $table->integer('mll')->nullable(true);
            $table->integer('ml')->nullable(true);
            $table->integer('gv')->nullable(true);
            $table->string('oocycle_quality')->nullable(true);
            $table->string('sperm_quality')->nullable(true);
            $table->string('fertilization_procedure')->nullable(true);
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('opd_patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ivf_transfer_reports');
    }
}





