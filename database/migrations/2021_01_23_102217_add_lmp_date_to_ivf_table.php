<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLmpDateToIvfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf', function (Blueprint $table) {
            $table->date('lmp_date')->after('donors')->nullable();
        });

        Schema::table('iui', function (Blueprint $table) {
            $table->date('lmp_date')->after('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ivf', function (Blueprint $table) {
            $table->dropColumn(['lmp_date']);
        });

        Schema::table('iui', function (Blueprint $table) {
            $table->dropColumn(['lmp_date']);
        });
    }
}
