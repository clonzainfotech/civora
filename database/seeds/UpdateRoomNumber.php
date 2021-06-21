<?php

use Illuminate\Database\Seeder;
use App\Models\IndoorRoom;
use App\Models\IndoorBed;

class UpdateRoomNumber extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('indoor_rooms')->update(['status'=> 0]);
        // Suite room 
        $indoorRoom = IndoorRoom::insert([
            [
                'id' => '33',
                'type_id' => '1',
                'room_no' => '301',
                'remark' => 'remark',
            ],
            // Delux room 
            [
                'id' => '34',
                'type_id' => '2',
                'room_no' => '304',
                'remark' => 'remark',
            ],
            [
                'id' => '35',
                'type_id' => '2',
                'room_no' => '305',
                'remark' => 'remark',
            ],
            [
                'id' => '36',
                'type_id' => '2',
                'room_no' => '306',
                'remark' => 'remark',
            ],
            // Special room 
            [
                'id' => '37',
                'type_id' => '3',
                'room_no' => '202',
                'remark' => 'remark',
            ],
            [
                'id' => '38',
                'type_id' => '3',
                'room_no' => '302',
                'remark' => 'remark',
            ],
            [
                'id' => '39',
                'type_id' => '3',
                'room_no' => '303',
                'remark' => 'remark',
            ],
            [
                'id' => '40',
                'type_id' => '3',
                'room_no' => '307',
                'remark' => 'remark',
            ],
            [
                'id' => '41',
                'type_id' => '3',
                'room_no' => '308',
                'remark' => 'remark',
            ],
            // General room
            [
                'id' => '42',
                'type_id' => '4',
                'room_no' => '201',
                'remark' => 'remark',
            ],
            [
                'id' => '43',
                'type_id' => '4',
                'room_no' => '202',
                'remark' => 'remark',
            ],
            [
                'id' => '44',
                'type_id' => '4',
                'room_no' => '203',
                'remark' => 'remark',
            ],
            [
                'id' => '45',
                'type_id' => '4',
                'room_no' => '204',
                'remark' => 'remark',
            ],
            [
                'id' => '46',
                'type_id' => '4',
                'room_no' => '309',
                'remark' => 'remark',
            ],
            [
                'id' => '47',
                'type_id' => '4',
                'room_no' => '309',
                'remark' => 'remark',
            ],
            [
                'id' => '48',
                'type_id' => '4',
                'room_no' => '309',
                'remark' => 'remark',
            ],
            [
                'id' => '49',
                'type_id' => '4',
                'room_no' => '309',
                'remark' => 'remark',
            ],
        ]);

        \DB::table('indoor_beds')->update(['status'=> 0]);
        $indoorBed = IndoorBed::insert([
            [
                'room_id' => '33',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '34',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '35',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '36',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '37',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '38',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '39',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '40',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '41',
                'bed_no' => 'A'
            ],

            [
                'room_id' => '42',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '43',
                'bed_no' => 'B'
            ],
            [
                'room_id' => '44',
                'bed_no' => 'C'
            ],
            [
                'room_id' => '45',
                'bed_no' => 'D'
            ],
            [
                'room_id' => '46',
                'bed_no' => 'A'
            ],
            [
                'room_id' => '47',
                'bed_no' => 'B'
            ],
            [
                'room_id' => '48',
                'bed_no' => 'C'
            ],
            [
                'room_id' => '49',
                'bed_no' => 'D'
            ]
        ]);
    }
}
