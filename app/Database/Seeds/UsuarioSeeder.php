<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UsuarioModel;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuarios = new UsuarioModel();

        $usuarios->insertBatch([
            [
                'rol'               => 'admin',
                'nombre'            => 'Edgar',
                'apaterno'          => 'Degante',
                'amaterno'          => 'Aguilar',
                'username'          => 'edgardegante',
                'email'             => 'edgar.degante.a@gmail.com',
                'password'          => password_hash('12345678', PASSWORD_DEFAULT),
                'sexo'              => 'm',
                'fechaNacimiento'   => '1988/06/18',
                'created_at'        => '2023-04-06 12:00:00'
            ]            
        ]);
    }
}
