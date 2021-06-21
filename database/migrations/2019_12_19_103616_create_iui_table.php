<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIuiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iui', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patients_id')->unsigned();
            $table->foreign('patients_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->integer('created_by')->nullable();
            $table->longText('patients_info')->nullable();
            $table->longText('h_o')->nullable();
            $table->longText('c_o')->nullable();
            $table->longText('o_h')->nullable();
            $table->longText('m_h')->nullable();
            $table->longText('ho_rx')->nullable();
            $table->longText('investigation')->nullable();
            $table->longText('husband_factor')->nullable();
            $table->longText('patients_details_ho')->nullable();
            $table->longText('o_e')->nullable();
            $table->longText('plan_management')->nullable();
            $table->longText('possible_case_of_infertility')->nullable();
            $table->longText('treatment')->nullable();
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
        Schema::dropIfExists('iui');
    }
}
