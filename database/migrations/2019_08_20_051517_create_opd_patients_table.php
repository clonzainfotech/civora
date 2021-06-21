<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpdPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opd_patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->integer('reference_doctor_id')->nullable();
            $table->bigInteger('hospital_doctor_id')->unsigned()->nullable();
            $table->foreign('hospital_doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('location')->nullable();
            $table->text('residence')->nullable();
            $table->text('main_area')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('other_mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('weight')->nullable();
            $table->tinyInteger('is_pregnant')->comment('2=no,1=yes')->nullable();
            $table->string('occupation')->nullable();
            $table->text('complain')->nullable();
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
        Schema::dropIfExists('opd_patients');
    }
}
