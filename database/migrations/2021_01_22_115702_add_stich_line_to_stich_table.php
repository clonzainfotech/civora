<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStichLineToStichTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stich', function (Blueprint $table) {
            $table->longText('stich_line')->after('oe')->nullable();
            $table->bigInteger('seen_by')->after('patients_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stich', function (Blueprint $table) {
            $table->dropColumn(['stich_line','seen_by']);
        });
    }
}
