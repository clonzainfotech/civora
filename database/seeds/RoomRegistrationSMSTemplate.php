<?php

use Illuminate\Database\Seeder;

class RoomRegistrationSMSTemplate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms_template')->insert([
            [
                'template' => 'Dear {{reff_drname}},
                                Thank you for reffering patient {{patient_fullname}} for {{procedure}} Today,
                                CandorIVF',
                'module' => 'sendRoomRegistrationDoctor',
                'status' => 1,
            ],
        ]);
        
    }
}
