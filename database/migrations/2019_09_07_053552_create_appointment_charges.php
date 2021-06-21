<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentCharges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appointment_id')->unsigned();
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->integer('consulting_charges')->nullable();
            $table->text('extra_field')->nullable();
            $table->integer('nst')->nullable();
            $table->integer('cut')->nullable();
            $table->integer('procedure')->nullable();
            $table->integer('usg')->nullable();
            $table->integer('dressing')->nullable();
            $table->integer('ivf')->nullable();
            $table->integer('total');
            $table->integer('discount')->nullable();
            $table->integer('netamount');
            $table->integer('payment_mode')->comment('1=card 2=cash');
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
        Schema::dropIfExists('appointment_charges');
    }
}
