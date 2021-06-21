<?php

use Illuminate\Database\Seeder;

class SystemSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_setting')->insert([
            'html_favicon' => 'logo2.png',
            'html_title' => config('app.name'),
            'header_logo' => 'logo2.png',
            'header_logo_width' => '40',
            'header_logo_height' => '40',
            'tag_line' => config('app.name'),
            'header_logo_alt' => 'Logo',
            'footer_copyright' => '',
            'facebook_link' => '',
            'instagram_link' => '',
            'twitter_link' => '',
            'linked_in_link' => '',
        ]);
    }
}
