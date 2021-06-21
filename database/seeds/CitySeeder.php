<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = City::insert([
            ["name" => "Ahmedabad"],
            ["anand" => "Anand"],
            ["banaskantha" => "Banaskantha"],
            ["bharuch" => "Bharuch"],
            ["bhavnagar" => "Bhavnagar"],
            ["dahod" => "Dahod"],
            ["dangs" => "Dangs"],
            ["gandhinagar" => "Gandhinagar"],
            ["jamnagar" => "Jamnagar"],
            ["junagadh" => "Junagadh"],
            ["kutch" => "Kutch"],
            ["kheda" => "Kheda"],
            ["mehsana" => "Mehsana"],
            ["narmada" => "Narmada"],
            ["navsari" => "Navsari"],
            ["patan" => "Patan"],
            ["panchmahal" => "Panchmahal"],
            ["porbandar" => "Porbandar"],
            ["rajkot" => "Rajkot"],
            ["sabarkantha" => "Sabarkantha"],
            ["surendranagar" => "Surendranagar"],
            ["surat" => "Surat"],
            ["vyara" => "Vyara"],
            ["vadodara" => "Vadodara"],
            ["valsad" => "Valsad"],
            ["other" => "Other"],
        ]);
    }
}
