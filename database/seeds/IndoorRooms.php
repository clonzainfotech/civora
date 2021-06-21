<?php

use Illuminate\Database\Seeder;

class IndoorRooms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = DB::table('indoor_rooms')->delete();
        DB::table('indoor_rooms')->insert([
            [
                'id' => 32,
                'type_id' => '1',
                'room_no' => 301,
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 33,
                'type_id' => '2',
                'room_no' => 304,
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 34,
                'type_id' => '2',
                'room_no' => 305,
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 35,
                'type_id' => '2',
                'room_no' => 306,
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 36,
                'type_id' => '3',
                'room_no' => 202,
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 37,
                'type_id' => '3',
                'room_no' => 302,
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 38,
                'type_id' => '3',
                'room_no' => 303,
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 39,
                'type_id' => '3',
                'room_no' => 307,
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 40,
                'type_id' => '3',
                'room_no' => 308,
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 41,
                'type_id' => '4',
                'room_no' => '201-A',
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 42,
                'type_id' => '4',
                'room_no' => '201-B',
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 43,
                'type_id' => '4',
                'room_no' => '201-C',
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 44,
                'type_id' => '4',
                'room_no' => '201-D',
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 45,
                'type_id' => '4',
                'room_no' => '201-E',
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 46,
                'type_id' => '4',
                'room_no' => '309-A',
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 47,
                'type_id' => '4',
                'room_no' => '309-B',
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 48,
                'type_id' => '4',
                'room_no' => '309-C',
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 49,
                'type_id' => '4',
                'room_no' => '309-D',
                'remark' => 'remark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
