<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraColumnToMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->tinyInteger('medicine_status')->nullable()->comment('1= After meal,2=Empty stomach,3=Instead of menstruation space')->after('name');
            $table->tinyInteger('dose')->nullable()->comment('1=OD,2=BD,3=TDS,4=ADS')->after('medicine_status');   
            $table->integer('number')->nullable()->after('dose');
            $table->integer('quantity')->nullable()->after('number');
            $table->string('medicine_time')->nullable()->comment('1=Morning,2=Afternoon,3=Evening')->after('quantity');
        });

        Schema::table('anc_history', function (Blueprint $table) {
            $table->longtext('h_o')->nullable()->after('patients_id');
            $table->longtext('injection')->nullable()->after('patients_details_ho');
            $table->longtext('usg')->nullable()->after('injection');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropColumn(['medicine_status','dose','number','quantity','medicine_time']);
        });

        Schema::table('anc_history', function (Blueprint $table) {
            $table->dropColumn(['injection','usg','h_o']);
        });
    }
}
