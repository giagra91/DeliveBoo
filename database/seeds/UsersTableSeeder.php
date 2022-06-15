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

        $userOne = new User();
        $userOne->name = "Pasta in Corso";
        $userOne->email = "pastaincorso@gmail.com";
        $userOne->logo_url = asset("img/loghi/pastaincorso_simbolo.png");
        $userOne->vat_number ="1238762635123";
        $userOne->address = "Corso Vittorio Emanuele II 273, 00186 Roma Italia";
        $userOne->password = Hash::make("password");
        $userOne->save();

        $userTwo = new User();
        $userTwo->name = "Tonnarello";
        $userTwo->email = "tonnarello@gmail.com";
        $userTwo->logo_url = asset("img/loghi/Logo-TONNARELLO.png");
        $userTwo->vat_number ="1138762639123";
        $userTwo->address = "Via della Paglia 1,2,3, 00153 Roma Italia";
        $userTwo->password = Hash::make("password");
        $userTwo->save();

        $userThree = new User();
        $userThree->name = "Mimì e Cocò Trast";
        $userThree->email = "info@mimiecoco.com";
        $userThree->logo_url = asset("img/loghi/mimiecoco_LOGO.png");
        $userThree->vat_number ="1198762639125";
        $userThree->address = "Via della Scala 1, 00153 Roma Italia";
        $userThree->password = Hash::make("password");
        $userThree->save();

        $userFour = new User();
        $userFour->name = "CiPASSO Bistrot";
        $userFour->email = "info@cipassoitalia.it";
        $userFour->logo_url = asset("img/loghi/mimiecoco_LOGO.png");
        $userFour->vat_number ="1198334439125";
        $userFour->address = "Via Metastasio 21, 00186 Roma Italia";
        $userFour->password = Hash::make("password");
        $userFour->save();

        $userFive = new User();
        $userFive->name = "Il Panzotto";
        $userFive->email = "ilpanzottodiroma@gmail.com";
        $userFive->logo_url = null;
        $userFive->vat_number ="1198762638825";
        $userFive->address = " Via Trionfale 94, 00195 Roma Italia";
        $userFive->password = Hash::make("password");
        $userFive->save();

        $userSix = new User();
        $userSix->name = "Il Ritrovo";
        $userSix->email = "info@ilritrovoroma.com";
        $userSix->logo_url = asset("img/loghi/il-ritrovo.png");
        $userSix->vat_number ="1198762638345";
        $userSix->address = "Via La Spezia, 36/42 Roma";
        $userSix->password = Hash::make("password");
        $userSix->save();

        $userSeven = new User();
        $userSeven->name = "RIONE XIV bistrot";
        $userSeven->email = "info@rionexiv.com";
        $userSeven->logo_url = asset("img/loghi/rione-xiv.jpg");
        $userSeven->vat_number ="1198762638123";
        $userSeven->address = "Borgo Pio, 21 San Pietro, 00193 Roma";
        $userSeven->password = Hash::make("password");
        $userSeven->save();

        $userEight = new User();
        $userEight->name = "Tira e Molla";
        $userEight->email = "tiraemolla@gmail.com";
        $userEight->logo_url = asset("img/loghi/tiraemolla_nero.png");
        $userEight->vat_number ="1191232638345";
        $userEight->address = "Via Enna 2, 00182 Roma";
        $userEight->password = Hash::make("password");
        $userEight->save();

        $userNine = new User();
        $userNine->name = "Rosamunda's";
        $userNine->email = "rosamundas@gmail.com";
        $userNine->logo_url = null;
        $userNine->vat_number ="1185257638345";
        $userNine->address = "Via Giuseppe Zanardelli 24, 00186 Roma";
        $userNine->password = Hash::make("password");
        $userNine->save();

        $userTen = new User();
        $userTen->name = "Angolo Sciarra";
        $userTen->email = "angolosciarra@gmail.com";
        $userTen->logo_url = null;
        $userTen->vat_number ="1191457638345";
        $userTen->address = "Via Marco Minghetti 8 Trevi, 00187 Roma";
        $userTen->password = Hash::make("password");
        $userTen->save();

    }
}
