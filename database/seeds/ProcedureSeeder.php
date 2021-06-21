<?php

use Illuminate\Database\Seeder;

class ProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('indoor_procedures')->insert([
            ['name'=>"Appendectomy"],
            ['name'=>'Breast biopsy'],
            ['name'=>"Carotid endarterectomy"],
            ['name'=>"Free skin graft"],
            ['name'=>"Hysterectomy"],
            ['name'=>"Prostatectomy"],
            ['name'=>"Lowerabdpain"],
            ['name'=>"Tonsillectomy"],
            ['name'=>"Partial colectomy"],
            ['name'=>"Dilation and curettage (D&C)"],
            ['name'=>"Coronary artery bypass"]
        ]);

    }
}
