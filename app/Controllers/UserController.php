<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class UserController extends BaseController
{

    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|min_length[5]|max_length[50]',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Nombre de usuario o contraseña incorrecta",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UsuarioModel();
                $user = $model->where('username', $this->request->getVar('username'))->first();
                $this->setUserSession($user);

                if($user['rol'] == "admin") {
                    return redirect()->to(base_url('admin'));
                }

                if($user['rol'] == "coordinador") {
                    return redirect()->to(base_url('coordinador'));
                }

                if($user['rol'] == "alumno") {
                    return redirect()->to(base_url('alumno'));
                }

                if(($user['rol'] == "docente") && ($user['status'] == "activo")) {
                    return redirect()->to(base_url('docente'));
                }
            }
        }
        return view('login');
    }


    private function setUserSession($user)
    {
        $data = [
            'id'            => $user['id'],
            'nombre'        => $user['nombre'],
            'apaterno'      => $user['apaterno'],
            'amaterno'      => $user['amaterno'],
            'username'      => $user['username'],
            'email'         => $user['email'],
            'isLoggedIn'    => true,
            'rol'           => $user['rol'],
            'sexo'          => $user['sexo'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

}


