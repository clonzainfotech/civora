<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfilePictureColumnToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_reviews', function (Blueprint $table) {
            $table->string('role_id')->nullable(true)->change();
            $table->integer('user_id')->after('role_id');
        });
        
        Schema::table('patients', function (Blueprint $table) {
            $table->string('profile_picture')->nullable()->after('complain');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_reviews', function (Blueprint $table) {
            $table->string('role_id')->nullable(false)->change();
            $table->dropColumn(['user_id']);
        });
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn(['profile_picture']);
        });
       
    }
}
