<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocenteModel;

class DocenteController extends BaseController
{

    public function logind()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|min_length[5]|max_length[50]',
                'password' => 'required|min_length[8]|max_length[255]|validateDocente[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateDocente' => "Nombre de usuario o contraseña incorrecta",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('docentes/login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new DocenteModel();

                $user = $model->where('username', $this->request->getVar('username'))->first();

                $this->setUserSession($user);

                if($user['rol'] == "docente") {
                    return redirect()->to(base_url('docente'));
                }
            }
        }
        return view('docentes/login');
    }



    private function setUserSession($user)
    {
        $data = [
            'id'            => $user['id'],
            'rol'           => $user['rol'],
            'username'      => $user['username'],
            'isLoggedIn'    => true,
            'horas_asignadas'   => $user['horas_asignadas'],
            'estatus'           => $user['estatus']
        ];

        session()->set($data);
        return true;
    }

    public function logoutd()
    {
        session()->destroy();
        return redirect()->to('logind');
    }



}


