<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SystemSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('html_favicon', 255)->nullable(true);
            $table->string('html_title', 255)->nullable(true);
            $table->string('header_logo', 255)->nullable(true);
            $table->string('header_logo_width', 255)->nullable(true);
            $table->string('header_logo_height', 255)->nullable(true);
            $table->string('tag_line', 255)->nullable(true);
            $table->string('header_logo_alt', 255)->nullable(true);
            $table->string('footer_copyright', 255)->nullable(true);
            $table->string('email', 50)->nullable(true);
            $table->text('facebook_link')->nullable(true);
            $table->text('instagram_link')->nullable(true);
            $table->text('twitter_link')->nullable(true);
            $table->text('linked_in_link')->nullable(true);
            $table->text('primary')->nullable(true);
            $table->text('secondary')->nullable(true);
            $table->text('link')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_setting');
    }
}
