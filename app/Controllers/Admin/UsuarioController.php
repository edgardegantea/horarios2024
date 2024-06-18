<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuarioModel;
use App\Models\CarreraModel;

class UsuarioController extends ResourceController
{
    private $usuario;
    private $carreraModel;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->usuario = new UsuarioModel();
        $this->carreraModel = new CarreraModel();
    }


    public function index()
    {
        $usuarios = $this->usuario->join('expedientes', 'usuarios.id = expedientes.docente', 'left')->orderBy('nombre', 'asc')->findAll();

        $data = [
            'usuarios' => $usuarios
        ];
        // return view('admin/usuarios/index', $data);
        return view('admin/usuarios/index', $data);
    }


    public function show($id = null)
    {
        //
    }


    public function new()
    {
        return view('admin/usuarios/create');
    }


    public function create()
    {
        $usuario = new UsuarioModel();

        $data = [
            'rol' => $this->request->getVar('rol'),
            'nombre' => $this->request->getVar('nombre'),
            'apaterno' => $this->request->getVar('apaterno'),
            'amaterno' => $this->request->getVar('amaterno'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'sexo' => $this->request->getVar('sexo'),
            'fechaNacimiento' => $this->request->getVar('fechaNacimiento')
        ];

        $rules = [
            'username' => 'required|is_unique[usuarios.username]'
        ];

        if ($this->validate($rules)) {
            $usuario->insert($data);
            return redirect()->to(site_url('/admin/usuarios'));
            session()->setFlashdata("success", "Usuario registrado con éxito");
        } else {
            $data['usernameDuplicado'] = lang('El nombre de usuario ya se encuentra registrado.');
            $data['emailDuplicado'] = lang('El e-mail ya se encuentra registrado.');
            return view('admin/usuarios/create', $data);
        }

    }


    public function edit($id = null)
    {
        $usuario = new UsuarioModel();
        $data['usuario'] = $usuario->find($id);

        return view('admin/usuarios/edit', $data);
    }


    public function update($id = null)
    {
        $usuario = new UsuarioModel();
        $data = [
            'rol' => $this->request->getVar('rol'),
            'nombre' => $this->request->getVar('nombre'),
            'apaterno' => $this->request->getVar('apaterno'),
            'amaterno' => $this->request->getVar('amaterno'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            // 'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'sexo' => $this->request->getVar('sexo'),
            'fechaNacimiento' => $this->request->getVar('fechaNacimiento'),
            'status' => $this->request->getVar('status'),
            'estatusDD' => $this->request->getVar('estatusDD'),
            'condicion' => $this->request->getVar('condicion'),
            'numHoras' => $this->request->getVar('numHoras')
        ];

        $usuario->update($id, $data);

        return redirect()->to('/admin/usuarios');
    }


    public function delete($id = null)
    {
        $usuario = new UsuarioModel();
        $usuario->delete($id);

        return redirect()->to('/admin/usuarios');
    }


    public function usuariosDocentes()
    {
        $usuariosDocentes = $this->usuario->join('expedientes', 'usuarios.id = expedientes.docente', 'left')->where('rol', 'docente')->orderBy('nombre', 'asc')->findAll();

        $data = [
            'usuariosDocentes' => $usuariosDocentes
        ];

        return view('admin/docentes/index', $data);
    }


    public function showDocente($id)
    {
        $usuario = $this->usuario->join('expedientes', 'usuarios.id = expedientes.docente', 'left')->find($id);

        $data = [
            'usuario' => $usuario
        ];

        return view('admin/docentes/showDocente', $data);
    }


    public function editPassword($id)
    {
        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->find($id);

        if (!$data['usuario']) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado.');
        }

        return view('admin/usuarios/edit_password', $data);
    }


    public function updatePassword($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado.');
        }

        $newPassword = $this->request->getPost('new_password');
        if (empty($newPassword)) {
            return redirect()->back()->with('error', 'La nueva contraseña no debe estar vacía.');
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $usuarioModel->update($id, ['password' => $hashedPassword]);

        return redirect()->to('/admin/usuarios')->with('success', 'Contraseña actualizada exitosamente.');
    }


    public function crearCoordinador()
    {
        $carreras = $this->carreraModel->orderBy('nombre', 'asc')->findAll();
        $data = [
            'carreras' => $carreras
        ];
        return view('admin/usuarios/crearCoordinador', $data);
    }


    public function storeCoordinador()
    {
        $data = [
            'rol' => $this->request->getVar('rol'),
            'nombre' => $this->request->getVar('nombre'),
            'apaterno' => $this->request->getVar('apaterno'),
            'amaterno' => $this->request->getVar('amaterno'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'sexo' => $this->request->getVar('sexo'),
            'fechaNacimiento' => $this->request->getVar('fechaNacimiento'),
            'numHoras' => $this->request->getVar('numHoras'),
            'carrera' => $this->request->getVar('carrera')
        ];

        $rules = [
            'username' => 'required|is_unique[usuarios.username]'
        ];

        if ($this->validate($rules)) {
            $this->usuario->insert($data);
            return redirect()->to(site_url('/admin/usuarios'));
            session()->setFlashdata("success", "COORDINADOR registrado con éxito");
        } else {
            $data['usernameDuplicado'] = lang('El nombre de usuario ya se encuentra registrado.');
            $data['emailDuplicado'] = lang('El e-mail ya se encuentra registrado.');
            return view('admin/usuarios/crearCoordinador', $data);
        }

    }

}
