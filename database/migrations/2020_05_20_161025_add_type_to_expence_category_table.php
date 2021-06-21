<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToExpenceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expance_category', function (Blueprint $table) {
            $table->integer('type')->nullable()->comment('1=income 2=expence');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expence_category', function (Blueprint $table) {
            $table->dropColumn(['type']);
        });
    }
}
