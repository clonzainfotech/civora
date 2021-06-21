<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob_date')->nullable()->after('role');
            $table->string('designation')->nullable()->after('dob_date');
            $table->string('degree')->nullable()->after('designation');
            $table->string('specialist')->nullable()->after('degree');
            $table->longText('achievement')->nullable()->after('specialist');
            $table->string('description')->nullable()->after('achievement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['dob_date','designation','degree','specialist','achievement','description']);
        });
    }
}
