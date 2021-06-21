<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIvfPlanReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('iui_reports');
        Schema::create('ivf_plan_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patients_id')->unsigned();
            $table->foreign('patients_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->tinyInteger('plan')->nullable()->comment('1=Pick Up, 2=FED OD');
            $table->tinyInteger('cycle_no')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('ivf_plan_report');
    }
}
