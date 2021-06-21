<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentToStatusToSmsTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_template', function (Blueprint $table) {
            DB::statement("ALTER TABLE sms_template CHANGE COLUMN status status TINYINT(4) COMMENT '0=deactive,1=active,2=custom'");
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
            DB::statement("ALTER TABLE sms_template CHANGE COLUMN status status TINYINT(4) COMMENT '0=deactive,1=active'");

        });
    }
}
