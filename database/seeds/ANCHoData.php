<?php

use Illuminate\Database\Seeder;
use App\Models\AncHoHistory;

class ANCHoData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        AncHoHistory::insert([
        [
            'type' => '1',
            'name' => 'NAD',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '1',
            'name' => 'Diabetes Mellitus',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '1',
            'name' => 'Thyroid',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '1',
            'name' => 'Heart Disease',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '1',
            'name' => 'Hypertension',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '2',
            'name' => 'NAD',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '2',
            'name' => 'tuberculosis_bacillus',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '2',
            'name' => 'Hypertension',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '2',
            'name' => 'Thyroid',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '2',
            'name' => 'DM',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '2',
            'name' => 'Appendectomy',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'type' => '2',
            'name' => 'Laparoscopy',
            'created_at' => date('Y-m-d H:i:s')
        ]
        ]);
    }
}
