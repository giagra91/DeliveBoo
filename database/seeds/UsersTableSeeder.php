<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10 ; $i++) { 
            $user = new User();
            $user->name = "mimmo";
            $user->email = "mimmo" . $i . "@gmail.com";
            $user->vat_number ="1234567890";
            $user->address = "Via Roma, 15";
            $user->password = Hash::make("password");
            $user->save();
        }

    }
}
