<?php

namespace App\Controllers\Coordinador;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CarreraModel;

class CarreraController extends ResourceController
{
    private $carreraModel;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->carreraModel = new CarreraModel();
    }

    

    public function index()
    {
        $carreras = $this->carreraModel->join('usuarios', 'carrera.coordinador = usuarios.id', 'left')->orderBy('nombre', 'asc')->findAll();

        $data = [
            'carreras'  => $carreras
        ];

        return view('coordinador/carreras/index', $data);
    }


    

    public function show($id = null)
    {
        //
    }





    public function new()
    { 
        return view('coordinador/carreras/create');
    }




    public function create()
    {

        $data = [
            'nombre'        => $this->request->getVar('nombre'),
            'descripcion'   => $this->request->getVar('descripcion'),
        ];

        $rules = [
            'nombre'    => 'required|is_unique[carreras.nombre]',
        ];

        if ($this->validate($rules)) {
            $this->carreraModel->insert($data);
            return redirect()->to(site_url('/coordinador/carreras'));
            session()->setFlashdata("success", "Carrera registrada con éxito");
        } else {
            return view('coordinador/carreras/create', $data);
        }

    }




    public function edit($id = null)
    {
        // $carreraModel = new UsuarioModel();
        $data['carrera'] = $this->carreraModel->find($id);

        return view('coordinador/carreras/edit', $data);
    }



    public function update($id = null)
    {
        $data = [
            'id'            => $this->request->getVar('id'),
            'nombre'        => $this->request->getVar('nombre'),
            'descripcion'   => $this->request->getVar('descripcion')
        ];

        $this->carreraModel->update($id, $data);

        return redirect()->to('/coordinador/carreras');
    }



    public function delete($id = null)
    {
        $this->carreraModel->delete($id);

        return redirect()->to('/coordinador/carreras');
    }



}
