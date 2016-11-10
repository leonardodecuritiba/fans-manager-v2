<?php

use Illuminate\Database\Seeder;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //php artisan db:seed --class=ClubTableSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders ***";
        factory(App\Club::class)->create();
        $user = \App\Club::find(1)->admin->user;
        $user->attachRole(2); // Setando o admin do clube como Role Admin
        echo "\n*** Club completo em ".round((microtime(true) - $start), 3)."s ***";
    }
}
