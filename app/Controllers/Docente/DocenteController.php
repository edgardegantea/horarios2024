<?php

namespace App\Controllers\Docente;

use App\Controllers\BaseController;
use App\Models\DocenteModel;

class DocenteController extends BaseController
{

    public function __construct()
    {
        if (session()->get('rol') != "docente") {
            echo view('accesonoautorizado');
            exit;
        }
    }


    public function index()
    {
        return view('docente/dashboard');
    }
}
