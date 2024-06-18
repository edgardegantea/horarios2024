<?php

namespace App\Controllers\Coordinador;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class CoordinadorController extends BaseController
{

    public function __construct()
    {
        if (session()->get('rol') != "coordinador") {
            echo view('accesonoautorizado');
            exit;
        }
    }


    public function index()
    {
        return view('coordinador/dashboard');
    }
}
