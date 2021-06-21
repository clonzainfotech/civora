<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsGynecToAncHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anc_history', function (Blueprint $table) {
            $table->tinyInteger('is_gynec')->default(0);
        });
        Schema::table('anc', function (Blueprint $table) {
            $table->tinyInteger('is_gynec')->default(0);
        });
        Schema::table('gynec', function (Blueprint $table) {
            $table->tinyInteger('is_gynec')->after('created_by')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anc_history', function (Blueprint $table) {
            $table->dropColumn(['is_gynec']);
        });
        Schema::table('anc', function (Blueprint $table) {
            $table->dropColumn(['is_gynec']);
        });
        Schema::table('gynec', function (Blueprint $table) {
            $table->dropColumn(['is_gynec']);
        });
    }
}
