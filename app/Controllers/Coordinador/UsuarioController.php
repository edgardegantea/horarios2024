<?php

namespace App\Controllers\Coordinador;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuarioModel;
use App\Models\DocentesCarrerasModel;

class UsuarioController extends ResourceController
{
    private $usuario;
    private $docentesCarreras;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->usuario = new UsuarioModel();
        $this->docentesCarreras = new DocentesCarrerasModel();    }

    

    public function index()
    {
        $usuarios = $this->usuario->join()->orderBy('id', 'desc')->findAll(50);

        $data = [
            'usuarios'  => $usuarios
        ];
        // return view('admin/usuarios/index', $data);
        return view('coordinador/usuarios/index', $data);
    }


    

    public function show($id = null)
    {
        //
    }





    public function new()
    {
        return view('coordinador/usuarios/create');
    }




    public function create()
    {
        $usuario = new UsuarioModel();

        $data = [
            'rol'               => $this->request->getVar('rol'),
            'nombre'            => $this->request->getVar('nombre'),
            'apaterno'          => $this->request->getVar('apaterno'),
            'amaterno'          => $this->request->getVar('amaterno'),
            'username'          => $this->request->getVar('username'),
            'email'             => $this->request->getVar('email'),
            'password'          => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'sexo'              => $this->request->getVar('sexo'),
            'fechaNacimiento'   => $this->request->getVar('fechaNacimiento')
        ];

        $rules = [
            'username'     => 'required|is_unique[usuarios.username]'
        ];

        if ($this->validate($rules)) {
            $usuario->insert($data);
            return redirect()->to(site_url('/coordinador/usuarios'));
            session()->setFlashdata("success", "Usuario registrado con éxito");
        } else {
            $data['usernameDuplicado'] = lang('El nombre de usuario ya se encuentra registrado.');
            $data['emailDuplicado'] = lang('El e-mail ya se encuentra registrado.');
            return view('coordinador/usuarios/create', $data);
        }

    }




    public function edit($id = null)
    {
        $usuario = new UsuarioModel();
        $data['usuario'] = $usuario->find($id);

        return view('coordinador/usuarios/edit', $data);
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
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'sexo' => $this->request->getVar('sexo'),
            'fechaNacimiento' => $this->request->getVar('fechaNacimiento'),
            'status' => $this->request->getVar('status')
        ];

        $usuario->update($id, $data);

        return redirect()->to('/coordinador/usuarios');
    }



    public function delete($id = null)
    {
        $usuario = new UsuarioModel();
        $usuario->delete($id);

        return redirect()->to('/coordinador/usuarios');
    }



    public function usuariosDocentes()
    {
        // $usuariosDocentes = $this->usuario->where('rol', 'docente')->orderBy('id', 'asc')->findAll();
        $this->session = \Config\Services::session();

        $db = \Config\Database::connect();
        $usuariosDocentes = $db->query('select
                u.id, concat(u.nombre, " ", u.apaterno, " ", u.amaterno) as profesor, 
                u.rol, u.username, u.email, u.sexo, u.email, u.sexo 
            from
                usuarios as u 
            join docentes_carreras as dc on dc.docente = u.id
            join carreras as c on dc.carrera = c.id
            join usuarios as coordinadores on c.coordinador = coordinadores.id
            where coordinadores.id ='.$this->session->id)->getResultArray();

        $data = [
            'usuariosDocentes'  => $usuariosDocentes
        ];

        return view('coordinador/docentes/index', $data);
    }



    public function editPassword($id)
    {
        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->find($id);

        if (!$data['usuario']) {
            return redirect()->to('/coordinador/usuarios')->with('error', 'Usuario no encontrado.');
        }

        return view('coordinador/usuarios/edit_password', $data);
    }


    public function updatePassword($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/coordinador/usuarios')->with('error', 'Usuario no encontrado.');
        }

        $newPassword = $this->request->getPost('new_password');
        if (empty($newPassword)) {
            return redirect()->back()->with('error', 'La nueva contraseña no debe estar vacía.');
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $usuarioModel->update($id, ['password' => $hashedPassword]);

        return redirect()->to('/coordinador/usuarios')->with('success', 'Contraseña actualizada exitosamente.');
    }





    public function index2()
    {
        $this->session = \Config\Services::session();

        // $db = \Config\Database::connect();
        // $docentes = $db->query('select * from docentes_carreras where carrera =', $this->session->get('carrera'))->getResultArray();


        // $docentes = $this->docentesCarreras->where('carrera', $this->session->get('carrera'))->findAll();
        $docentes = $this->docentesCarreras->select('usuarios.nombre', 'carreras.nombre')
            ->join('carreras', 'docentes_carreras.carrera = carreras.id')
            ->join('usuarios', 'carreras.id = usuarios.carrera', 'left')
            ->findAll();

        dd($docentes);

    }


}
