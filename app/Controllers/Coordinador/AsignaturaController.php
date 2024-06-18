<?php

namespace App\Controllers\Coordinador;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AsignaturaModel;
use App\Models\CarreraModel;

class AsignaturaController extends ResourceController
{
    private $asignaturaModel;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->asignaturaModel = new AsignaturaModel();
    }

    

    public function index()
    {
        $asignaturas = $this->asignaturaModel->orderBy('nombre', 'asc')->findAll();
        $carreraModel = new CarreraModel();

        $data = [
            'asignaturas'   => $asignaturas,
            'carreras'      => $carreraModel->orderBy('nombre', 'asc')->findAll()
        ];

        return view('coordinador/asignaturas/index', $data);
    }


    

    public function show($id = null)
    {
        //
    }





    public function new()
    {
        $carreraModel = new CarreraModel();

        $data = [
            'carreras'      => $carreraModel->orderBy('nombre', 'asc')->findAll()
        ];   
        return view('coordinador/asignaturas/create', $data);
    }




    public function create()
    {

        $data = [
            'nombre'        => $this->request->getVar('nombre'),
            'clave'         => $this->request->getVar('clave'),
            'descripcion'   => $this->request->getVar('descripcion'),
            'carrera'       => $this->request->getVar('carrera'),
            'creditos'      => $this->request->getVar('creditos')
        ];

        $rules = [
            'nombre'    => 'required|is_unique[asignaturas.nombre]',
            'creditos' => 'required'
        ];

        if ($this->validate($rules)) {
            $this->asignaturaModel->insert($data);
            return redirect()->to(site_url('/coordinador/asignaturas'));
            session()->setFlashdata("success", "Asignatura registrada con éxito");
        } else {
            return view('coordinador/asignaturas/create', $data);
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
        $usuariosDocentes = $this->usuario->where('rol', 'docente')->orderBy('id', 'asc')->findAll();

        $data = [
            'usuariosDocentes'  => $usuariosDocentes
        ];

        return view('coordinador/docentes/index', $data);
    }

}
