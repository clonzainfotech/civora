<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsCheckedToUsernoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usernote', function (Blueprint $table) {
            $table->tinyInteger('is_checked')->comment('0=no,1=yes')->default(0)->nullable(false)->after('discription');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usernote', function (Blueprint $table) {
            $table->dropColumn('is_checked');
        });
    }
}
