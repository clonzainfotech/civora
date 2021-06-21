<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdmitTimeDischargeCardToIndoorBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->time('admit_time')->after('dod_date')->nullable();
            $table->time('discharge_time')->after('admit_time')->nullable();
        });
        if (Schema::hasColumn('indoor_discharge_cards', 'admit_time')){
            Schema::table('indoor_discharge_cards', function (Blueprint $table) {
                $table->dropColumn('admit_time');
            });
        }
        if (Schema::hasColumn('indoor_discharge_cards', 'discharge_time')){
            Schema::table('indoor_discharge_cards', function (Blueprint $table) {
                $table->dropColumn('discharge_time');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->dropColumn(['admit_time','discharge_time']);
        });
    }
}
