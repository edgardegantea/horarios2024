<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\CarreraModel;

class DocentesCarrerasController extends BaseController
{


    protected $carreraModel;
    protected $usuarioModel;


    public function __construct()
    {
        $this->carreraModel = new CarreraModel();
        $this->usuarioModel = new UsuarioModel();
    }


    public function index2()
    {
        $db = \Config\Database::connect();
        // $dc = $db->query('select * from docentes_carreras')->getResultArray();
        $dc = $db->query('select di.codigo, concat(di.nombre, " ", di.aPaterno, " ", di.aMaterno) as "docente", c.nombre as "carrera" from carreras as c join docentes_carreras as dc on dc.carrera = c.id join docentes as d on dc.docente = d.id join docenteinfo as di on di.id = d.id')->getResultArray();

        dd($dc);
    }



    public function index()
    {
        $docentes = $this->usuarioModel->where('rol', 'docente')->orderBy('nombre', 'asc')->findAll();
        $carreras = $this->carreraModel->orderBy('nombre', 'asc')->findAll();

        $db = \Config\Database::connect();
        $docentesxcarreras = $db->query('select * from docentes_carreras')->getResultArray();

        $data = [
            'carreras' => $carreras,
            'docentes' => $docentes,
            'docentesxcarreras' => $docentesxcarreras
        ];

        return view('admin/docentescarreras/index', $data);
    }



}
