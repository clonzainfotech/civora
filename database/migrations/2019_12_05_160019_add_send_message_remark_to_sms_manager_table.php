<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSendMessageRemarkToSmsManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_manager', function (Blueprint $table) {
            $table->text('send_message')->nullable()->after('message');
            $table->text('remark')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_manager', function (Blueprint $table) {
            $table->dropColumn('send_message');
            $table->dropColumn('remark');
        });
    }
}
