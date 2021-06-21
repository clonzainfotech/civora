<?php

use Illuminate\Database\Seeder;
use App\Models\Complaint;

class ComplaintsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $complaints = [
            ['name'=>"Nausea"],
            ['name'=>'vomitting'],
            ['name'=>"Giddiness"],
            ['name'=>"Cold"],
            ['name'=>"Cough"],
            ['name'=>"Constipation"],
            ['name'=>"Lowerabdpain"],
            ['name'=>"Headache"],
            ['name'=>"Anorexia"],
            ['name'=>"Loossmotion"],
            ['name'=>"Backache"]
        ];

        Complaint::insert($complaints);
    }
}
