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
        $userOne = new User();
        $userOne->name = "Pasta in Corso";
        $userOne->email = "pastaincorso@gmail.com";
        $userOne->logo = asset("img/loghi/pastaincorso_simbolo.png");
        $userOne->vat_number ="1238762635123";
        $userOne->address = "Corso Vittorio Emanuele II 273, 00186 Roma Italia";
        $userOne->password = Hash::make("password");
        $userOne->save();

        $userTwo = new User();
        $userTwo->name = "Tonnarello";
        $userTwo->email = "tonnarello@gmail.com";
        $userTwo->logo = asset("img/loghi/Logo-TONNARELLO.png");
        $userTwo->vat_number ="1138762639123";
        $userTwo->address = "Via della Paglia 1,2,3, 00153 Roma Italia";
        $userTwo->password = Hash::make("password");
        $userTwo->save();

        $userThree = new User();
        $userThree->name = "Mimì e Cocò Trast";
        $userThree->email = "info@mimiecoco.com";
        $userThree->logo = asset("img/loghi/mimiecoco_LOGO.png");
        $userThree->vat_number ="1198762639125";
        $userThree->address = "Via della Scala 1, 00153 Roma Italia";
        $userThree->password = Hash::make("password");
        $userThree->save();

        $userFour = new User();
        $userFour->name = "CiPASSO Bistrot";
        $userFour->email = "info@cipassoitalia.it";
        $userFour->logo = asset("img/loghi/mimiecoco_LOGO.png");
        $userFour->vat_number ="1198334439125";
        $userFour->address = "Via Metastasio 21, 00186 Roma Italia";
        $userFour->password = Hash::make("password");
        $userFour->save();

        $userFive = new User();
        $userFive->name = "Il Panzotto";
        $userFive->email = "ilpanzottodiroma@gmail.com";
        $userFive->logo = null;
        $userFive->vat_number ="1198762638825";
        $userFive->address = "Via Trionfale 94, 00195 Roma Italia";
        $userFive->password = Hash::make("password");
        $userFive->save();
    }
}
