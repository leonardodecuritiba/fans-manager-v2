<?php

use App\Role;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        Criando as permisões
        //php artisan db:seed --class=PermissionTableSeeder
        $start = microtime(true);
        echo "*** Iniciando os PermissionTableSeeder ***";
        $superadmin = new Role();
        $superadmin->name = 'superadmin';
        $superadmin->display_name = 'Usuário SuperAdmin'; // optional
        $superadmin->description = 'Usuário com acesso total'; // optional
        $superadmin->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Acesso Admin'; // optional
        $admin->description = 'Acesso total ao clube'; // optional
        $admin->save();

        $fans = new Role();
        $fans->name = 'fan';
        $fans->display_name = 'Usuário do tipo torcedor'; // optional
        $fans->description = 'Acesso com acesso restrito'; // optional
        $fans->save();
        echo "\n*** PermissionTableSeeder completo em " . round((microtime(true) - $start), 3) . "s ***";

    }
}
