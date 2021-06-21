<?php

use Illuminate\Database\Seeder;
use App\Models\OvaryDetail;

class OvaryDetails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OvaryDetail::insert([
            ['name'=>'Normal','type'=>1],
            ['name'=>'Left ovary dear cyst off size ..x..cm','type'=>1],
            ['name'=>'Left ovary smaller with only ..afc.S\o poor ovarian reserve','type'=>1],
            ['name'=>'Left ovary show old corpus luteum','type'=>1],
            ['name'=>'Left ovary haemorrhagic cyst of size ..x..cm','type'=>1],
            ['name'=>'Left ovary polycystic pattern with increased stroma','type'=>1],
            ['name'=>'Left ovary not visualised','type'=>1],
            ['name'=>'Not Imaged','type'=>1],
            ['name'=>'Unassigned','type'=>1],
            ['name'=>'Normal','type'=>2],
            ['name'=>'Right ovary dear cyst off size ..x..cm','type'=>2],
            ['name'=>'Right ovary smaller with only ..afc.S\o poor ovarian reserve','type'=>2],
            ['name'=>'Right ovary show old corpus luteum','type'=>2],
            ['name'=>'Right ovary haemorrhagic cyst of size ..x..cm','type'=>2],
            ['name'=>'Right ovary polycystic pattern with increased stroma','type'=>2],
            ['name'=>'Right ovary not visualised','type'=>2],
            ['name'=>'Not Imaged','type'=>2],
            ['name'=>'Unassigned','type'=>2],
        ]);
    }
}
