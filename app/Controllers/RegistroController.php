<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class RegistroController extends BaseController
{
    public function new()
    {
        return view('pages/registro');
    }



    public function create()
    {
        $usuarioModel = new UsuarioModel();

        $data = [
            'rol'               => 'docente',
            'nombre'            => $this->request->getPost('nombre'),
            'apaterno'          => $this->request->getPost('apaterno'),
            'amaterno'          => $this->request->getPost('amaterno'),
            'username'          => $this->request->getPost('username'),
            'rfc'               => $this->request->getPost('rfc'),
            'email'             => $this->request->getPost('email'),
            'password'          => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'sexo'              => $this->request->getPost('sexo'),
            'fechaNacimiento'   => $this->request->getPost('fechaNacimiento'),
            'status'            => 1
        ];

        $usuarioModel->insert($data);

        return redirect()->to('login');
    }

}
