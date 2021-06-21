<?php

use Illuminate\Database\Seeder;

class DischargeComplaintData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('discharge_complaints')->insert([
            ['name'=>'Labour Pain','status'=>'1','created_by'=>29,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['name'=>'Nausea','status'=>'1','created_by'=>29,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['name'=>'Vomiting','status'=>'1','created_by'=>29,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['name'=>'Abd Pain','status'=>'1','created_by'=>29,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['name'=>'Lower Abd pain','status'=>'1','created_by'=>29,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['name'=>'For elective LSCS','status'=>'1','created_by'=>29,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['name'=>'Fever','status'=>'1','created_by'=>29,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['name'=>'Headache','status'=>'1','created_by'=>29,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ]);
    }
}
