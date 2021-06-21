<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIuiReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iui_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patients_id')->unsigned();
            $table->foreign('patients_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->string('donor_name')->nullable();
            $table->integer('donor_age')->nullable();
            $table->tinyInteger('cycle_no')->nullable();
            $table->string('indication')->nullable();
            $table->longText('description')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('iui_reports');
    }
}
