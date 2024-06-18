<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\DocenteModel;

class DocenteSeeder extends Seeder
{
    public function run()
    {
        $docentes = new DocenteModel();

        $docentes->insertBatch([
            [
                'rol'               => 'docente',
                'username'          => 'maria',
                'password'          => password_hash('12345678', PASSWORD_DEFAULT),               
                'horas_asignadas'   => 40,
                'estatus'           => 1,
                'created_at'        => '2023-04-06 12:00:00'
            ]            
        ]);
    }
}
