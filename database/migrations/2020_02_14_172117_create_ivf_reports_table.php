<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIvfReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ivf_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patients_id')->unsigned();
            $table->foreign('patients_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->tinyInteger('plan')->comment('1=Pick Up,2=FET,3=FET-OD,4=FET-ED')->default(1);
            $table->tinyInteger('cycle_no')->nullable();
            $table->date('date')->nullable();
            $table->string('reason')->nullable();
            $table->longText('volume')->nullable();
            $table->longText('sperm_count')->nullable();
            $table->longText('total_motility')->nullable();
            $table->longText('actively')->nullable();
            $table->longText('sluggishly')->nullable();
            $table->longText('non_motile')->nullable();
            $table->longText('morphology')->nullable();
            $table->longText('pus_cells')->nullable();
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
        Schema::dropIfExists('ivf_reports');
    }
}
