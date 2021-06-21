<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAmountFieldsToIndoorDeposits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_deposits', function (Blueprint $table) {
            DB::statement("ALTER TABLE indoor_deposits CHANGE COLUMN total total FLOAT(8,2) UNSIGNED");
            DB::statement("ALTER TABLE indoor_deposits CHANGE COLUMN amount amount FLOAT UNSIGNED");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_deposits', function (Blueprint $table) {
            DB::statement("ALTER TABLE indoor_deposits CHANGE COLUMN total total DOUBLE(8,2)");
            DB::statement("ALTER TABLE indoor_deposits CHANGE COLUMN amount amount DOUBLE");
        });
    }
}
