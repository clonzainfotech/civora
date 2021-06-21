<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFlagToIndoorRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_rooms', function (Blueprint $table) {
            $table->tinyInteger('flag')->default(0)->comment('0=empty,1=booked')->after('remark');
        });
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->dropColumn(['bed_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_rooms', function (Blueprint $table) {
            $table->dropColumn(['flag']);
        });
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->integer('bed_id');
        });
    }
}
