<?php

namespace App\Controllers\Coordinador;

use CodeIgniter\RESTful\ResourceController;
use App\Models\GrupoModel;

class GrupoController extends ResourceController
{

    protected $grupoModel;
    

    public function __construct()
    {
        $this->grupoModel = new GrupoModel();
    }

    

    public function index()
    {
        $grupos = $this->grupoModel->findAll();

        $data = [
            'grupos' => $grupos
        ];

        return view('coordinador/grupos/index', $data);
    }


    

    public function show($id = null)
    {
        
    }


    

    public function new()
    {
        return view('coordinador/grupos/create');
    }


    

    public function create()
    {
        $data = [
            'clave'         => $this->request->getVar('clave'),
            'nombre'        => $this->request->getVar('nombre')
        ];

        $rules = [
            'clave'     => 'required|is_unique[grupos.clave]',
            'nombre'    => 'required|is_unique[grupos.nombre]',
        ];

        if ($this->validate($rules)) {
            $this->grupoModel->insert($data);
            return redirect()->to(site_url('/coordinador/grupos'));
            session()->setFlashdata("success", "Grupo registrado con éxito");
        } else {
            return view('coordinador/grupos/create', $data);
        }
    }


    

    public function edit($id = null)
    {
        $data = [
            'grupo' => $this->grupoModel->find($id)
        ];

        return view('coordinador/grupos/edit', $data);
    }


    

    public function update($id = null)
    {
        $data = [
            'id'            => $this->request->getVar('id'),
            'clave'         => $this->request->getVar('clave'),
            'nombre'        => $this->request->getVar('nombre')
        ];

        $this->grupoModel->update($id, $data);

        return redirect()->to('/coordinador/grupos');
    }


    

    public function delete($id = null)
    {
        //
    }

}
