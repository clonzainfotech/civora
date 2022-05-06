<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferenceTypeInRefernceDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reference_doctors', function (Blueprint $table) {
            $table->integer('reference_type')->default(1)->after('deleted_by')->comment('1=offline,2=online,3=lead');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reference_doctors', function (Blueprint $table) {
            //
        });
    }
}
