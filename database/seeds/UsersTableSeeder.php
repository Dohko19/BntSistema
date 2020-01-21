<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();

        $userAdmin = new User;
        $userAdmin->name = 'Administrador';
        $userAdmin->closter_id = 1;
        $userAdmin->marca_id = 1;
        $userAdmin->email = 'admin@email.com';
        $userAdmin->password = '123123';
        $userAdmin->save();

        $userCliente = new User;
        $userCliente->name = 'Cliente';
        $userCliente->closter_id = 1;
        $userCliente->marca_id = 1;
        $userCliente->email = 'cliente@email.com';
        $userCliente->password = '123123';
        $userCliente->save();

        $roleAdmin = new Role;
        $roleAdmin->name = 'admin';
        $roleAdmin->display_name = 'Administrador del Sitio';
        $roleAdmin->descripcion = 'Aministrador completo del sitio';
        $roleAdmin->save();

        $roleCliente = new Role;
        $roleCliente->name = 'cliente';
        $roleCliente->display_name = 'Cliente del sitio';
        $roleCliente->descripcion = 'Cliente/usuario basico del sitio';
        $roleCliente->save();

        $userAdmin->roles()->attach($roleAdmin);
        $userCliente->roles()->attach($roleCliente);
    }
}
