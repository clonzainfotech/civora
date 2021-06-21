<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameDescriptionToSmsTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_template', function (Blueprint $table) {
            $table->renameColumn('description', 'module');
        });
        Schema::table('sms_template', function (Blueprint $table) {
            $table->string('module', 50)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_template', function (Blueprint $table) {
            $table->renameColumn('module', 'description');
        });

        Schema::table('sms_template', function (Blueprint $table) {
            $table->text('description')->change();
        });
    }
}
