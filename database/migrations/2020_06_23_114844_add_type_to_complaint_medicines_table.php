<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToComplaintMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaint_medicines', function (Blueprint $table) {
            $table->dropForeign(['complaint_id']);
            $table->dropColumn('complaint_id');
            $table->integer('type')->nullable()->after('id')->comment('1=co,2=ho');
            $table->integer('type_id')->nullable()->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaint_medicines', function (Blueprint $table) {
            $table->dropColumn(['type','type_id']);
            $table->integer('complaint_id')->nullable();
        });
    }
}
