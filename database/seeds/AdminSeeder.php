<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'admin';
        $user->email = 'jaydevdhameliya@gmail.com';
        $user->password = bcrypt('Jaydev#1234');
        $user->role = 1;
        $user->save();
    }
}
