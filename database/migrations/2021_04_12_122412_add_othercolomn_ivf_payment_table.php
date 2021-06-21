<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOthercolomnIvfPaymentTable extends Migration
{
    public function up()
    {
        Schema::table('ivf_payment', function (Blueprint $table) {
            $table->bigInteger('HMG')->nullable()->after('gonadotropins_status');
            $table->string('HMG_status')->nullable()->after('HMG');
            $table->bigInteger('RFSH')->nullable()->after('HMG_status');
            $table->string('RFSH_status')->nullable()->after('RFSH');
            $table->bigInteger('Gonal_F')->nullable()->after('RFSH_status');
            $table->string('Gonal_status')->nullable()->after('Gonal_F');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ivf_payment', function (Blueprint $table) {
            $table->dropColumn(['HMG','HMG_status','RFSH','RFSH_status','Gonal_F','Gonal_status']);
        });
    }
}
