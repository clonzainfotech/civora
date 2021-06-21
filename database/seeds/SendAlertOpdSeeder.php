<?php

use Illuminate\Database\Seeder;

class SendAlertOpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sms_template')->insert([
            [
                'template' => 'Dear {{reff_drname}},
Thank you for reffering patient {{patient_fullname}} today,
CandorIVF',
                'module' => 'sendAlrtOpdToDoctor',
                'status' => 1,
            ],
        ]);
    }
}
