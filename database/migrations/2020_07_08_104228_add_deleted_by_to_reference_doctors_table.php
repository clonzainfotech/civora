<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedByToReferenceDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reference_doctors', function (Blueprint $table) {
            $table->integer('deleted_by')->nullable()->after('created_by');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reference_doctors', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn(['deleted_by']);
        });
    }
}
