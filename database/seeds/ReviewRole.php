<?php

use Illuminate\Database\Seeder;

class ReviewRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review_roles')->insert([

            ['name' => 'staff',],
            ['name' => 'doctor',],
            ['name' => 'punctuality',],
            ['name' => 'helpfulness',],
            ['name' => 'service',]
        ]);
    }
}
