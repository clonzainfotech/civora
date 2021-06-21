<?php

use Illuminate\Database\Seeder;

class InjectionCharges extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('injection_charges')->insert([
            [	
            	'name' => 'Follisurge 75',
            	'net_price' => '600',
        		'mrp' => '1705',
        	],
        	[
        		'name' => 'Follisurge 150',
            	'net_price' => '1300',
        		'mrp' => '3300',
        	],
        	[
        		'name' => 'Gonarec 75',
            	'net_price' => '600',
        		'mrp' => '1890',
        	],
        	[
        		'name' => 'GMH 75',
            	'net_price' => '300',
        		'mrp' => '985',
        	],
        	[
        		'name' => 'GMH 150',
            	'net_price' => '381',
        		'mrp' => '1485',
        	],
        	[
        		'name' => 'Endokine',
            	'net_price' => '530',
        		'mrp' => '1504',
        	],
        	[
        		'name' => 'Deca',
            	'net_price' => '272',
        		'mrp' => '350',
        	],
        	[
        		'name' => 'Follisurge 1200',
            	'net_price' => '11000',
        		'mrp' => '23000',
        	],
        	[
        		'name' => 'Humog 225',
            	'net_price' => '600',
        		'mrp' => '1837',
        	],
        	[
        		'name' => 'DIVA 75',
            	'net_price' => '290',
        		'mrp' => '775',
        	],
        	[
        		'name' => 'DIVA 150',
            	'net_price' => '390',
        		'mrp' => '1272',
        	],
        	[
        		'name' => 'Menosar 75',
            	'net_price' => '270',
        		'mrp' => '1010',
        	],
        	[
        		'name' => 'Menosar 150',
            	'net_price' => '458',
        		'mrp' => '1804',
        	],    
        ]);
    }
}
