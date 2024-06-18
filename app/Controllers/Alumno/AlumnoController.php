<?php

namespace App\Controllers\Alumno;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class AlumnoController extends BaseController
{

    public function __construct()
    {
        if (session()->get('rol') != "alumno") {
            echo view('accesonoautorizado');
            exit;
        }
    }


    public function index()
    {
        echo 'Index de AlumnoController';
    }
}
