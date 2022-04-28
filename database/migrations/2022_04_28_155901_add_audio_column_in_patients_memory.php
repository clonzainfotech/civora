<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAudioColumnInPatientsMemory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients_memory', function (Blueprint $table) {
            $table->text('file')->default(null)->nullable()->after('image');
        });
    }

    /**         
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients_memory', function (Blueprint $table) {
            //
        });
    }
}
