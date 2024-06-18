<?php

namespace App\Controllers\Coordinador;

use App\Controllers\BaseController;
use App\Models\DocenteModel;
use App\Models\CarreraModel;
use App\Models\AsignaturaModel;

class MapaCurricular extends BaseController
{
    public function index()
    {
        $this->session = \Config\Services::session();

        $db = \Config\Database::connect();

        $asignaturas    = $db->query('select * from asignaturas')->getResultArray();
        $docentes       = $db->query('select * from docentes')->getResultArray();
        $carreras       = $db->query('select * from carreras')->getResultArray();
        $coordinador    = $db->query('select nombre, username from usuarios')->getResultArray();

        $data = [
            'asignaturas'   => $asignaturas,
            'docentes'      => $docentes,
            'carreras'      => $carreras,
            'coordinador'   => $coordinador
        ];

        dd($data);

    }


    public function create()
    {
        $this->session = \Config\Services::session();

        $db = \Config\Database::connect();

        $asignaturas    = $db->query('select * from asignaturas')->getResultArray();
        $docentes       = $db->query('select * from docentes')->getResultArray();
        $carreras       = $db->query('select * from carreras')->getResultArray();
        $grupos         = $db->query('select * from grupos')->getResultArray();
        $coordinador    = $db->query('select nombre, username from usuarios where rol = "coordinador"')->getResultArray();

        $data = [
            'asignaturas'   => $asignaturas,
            'docentes'      => $docentes,
            'carreras'      => $carreras,
            'grupos'        => $grupos,
            'coordinador'   => $coordinador
        ];

        dd($data);
    }

    public function store()
    {

    }

}
