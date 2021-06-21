<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIuiHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iui_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patients_id')->unsigned();
            $table->foreign('patients_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->integer('created_by');
            $table->tinyInteger('visit');
            $table->longText('description');
            $table->tinyInteger('cycle_no');
            $table->tinyInteger('cycle_status')->default(0)->comment('0=pending,1=active,2=finished');
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
        Schema::dropIfExists('iui_history');
    }
}
