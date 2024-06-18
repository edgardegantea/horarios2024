<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HorarioController extends BaseController
{
    public function index()
    {
        return view('horarios/horario');
    }


    public function horario()
    {
        return view('horarios/horario');
    }
}
