<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtpColumnInPatientSignupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients_signup', function (Blueprint $table) {
            $table->integer('otp')->default(null)->after('other_reference');
            $table->integer('is_verify')->default(0)->after('other_reference');
            $table->integer('is_new')->default(1)->after('other_reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients_signup', function (Blueprint $table) {
            //
        });
    }
}
