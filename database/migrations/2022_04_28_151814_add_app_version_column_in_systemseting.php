<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppVersionColumnInSystemseting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_setting', function (Blueprint $table) {
            $table->float('app_android_version')->default(null)->nullable()->after('water_mark');
            $table->float('app_ios_version')->default(null)->nullable()->after('water_mark');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('systemseting', function (Blueprint $table) {
            //
        });
    }
}
