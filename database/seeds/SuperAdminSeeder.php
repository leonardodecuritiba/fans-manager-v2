<?php

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=SuperAdminSeeder
        $start = microtime(true);
        echo "*** Iniciando os Seeders SuperAdminSeeder***";
        factory(App\SuperAdmin::class)->create();
        $user = App\SuperAdmin::find(1)->user;
        $user->attachRole(1); // Setando o superadmin
        echo "\n*** SuperAdminSeeder completo em " . round((microtime(true) - $start), 3) . "s ***";
    }
}
