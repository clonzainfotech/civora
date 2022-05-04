<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnNameVisitRemarkToImportantNoteInAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->renameColumn('visit_remark', 'important_note');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            //
        });
    }
}
