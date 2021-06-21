<?php

use Illuminate\Database\Seeder;
use App\Models\GivenTreatments;

class GivenTreatment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GivenTreatments::insert([

            ['name'=>'Antiemetic'],
            ['name'=>'Antacid'],
            ['name'=>'Iv Fluid'],

        ]);
    }
}
