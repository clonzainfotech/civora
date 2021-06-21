<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIvfPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ivf_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patients_id')->unsigned();
            $table->foreign('patients_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->double('deposit', 8, 2)->unsigned()->nullable();
            $table->integer('cycle_no')->nullable();
            $table->string('time')->nullable();
            $table->double('remaining_payment',8,2)->nullable();
            $table->double('total_payment',8,2)->nullable();
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
        Schema::dropIfExists('ivf_payment');
    }
}
