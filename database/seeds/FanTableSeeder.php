<?php

use Illuminate\Database\Seeder;

class FanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //php artisan db:seed --class=FanTableSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders ***";
        factory(App\Fan::class, 5)->create();
        $fans = \App\Fan::all();
        foreach ($fans as $fan) {
            $fan->user->attachRole(3); // Setando o admin do clube como Role Torcedor
        }
        echo "\n*** Fan completo em ".round((microtime(true) - $start), 3)."s ***";
    }
}
