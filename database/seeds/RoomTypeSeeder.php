<?php

use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('indoor_types')->insert([

            // [
            //     'name' => 'Delux',
            //     'price' => 400,
            //     'remark' => 'remark',
            // ],
            // [
            //     'name' => 'Special',
            //     'price' => 300,
            //     'remark' => 'remark',
            // ],
            // [
            //     'name' => 'Semi Special',
            //     'price' => 200,
            //     'remark' => 'remark',
            // ],
            // [
            //     'name' => 'General',
            //     'price' => 100,
            //     'remark' => 'remark',
            // ],
            [
                'name' => 'Suite',
                'price' => 400,
                'remark' => 'remark',
            ],
            [
                'name' => 'Delux',
                'price' => 300,
                'remark' => 'remark',
            ],
            [
                'name' => 'Special',
                'price' => 200,
                'remark' => 'remark',
            ],
            [
                'name' => 'General',
                'price' => 100,
                'remark' => 'remark',
            ],

        ]);
    }
}
