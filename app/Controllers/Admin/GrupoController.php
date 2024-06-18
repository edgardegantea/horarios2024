<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\GrupoModel;
use App\Models\PeriodoEscolarModel;
use App\Models\CarreraModel;


class GrupoController extends ResourceController
{

    protected $grupoModel;
    protected $periodoEscolarModel;
    protected $carreraModel;
    

    public function __construct()
    {
        $this->grupoModel = new GrupoModel();
        $this->periodoEscolarModel = new PeriodoEscolarModel();
        $this->carreraModel = new CarreraModel();
    }

    

    public function index()
    {
        $grupos = $this->grupoModel->findAll();

        $data = [
            'grupos' => $grupos
        ];

        return view('admin/grupos/index', $data);
    }


    

    public function show($id = null)
    {
        
    }


    

    public function new()
    {
        $pescolares = $this->periodoEscolarModel->findAll();
        $carreras   = $this->carreraModel->orderBy('nombre', 'asc')->findAll();

        $data = [
            'pescolares'    => $pescolares,
            'carreras'      => $carreras
        ];

        return view('admin/grupos/create', $data);
    }


    

    public function create()
    {
        $data = [
            'clave'         => $this->request->getVar('clave'),
            'nombre'        => $this->request->getVar('nombre'),
            'carrera'       => $this->request->getVar('carrera')
        ];

        $rules = [
            'clave'     => 'required|is_unique[grupos.clave]',
            'nombre'    => 'required|is_unique[grupos.nombre]',
            'modalidad' => 'required'
        ];

        if ($this->validate($rules)) {
            $this->grupoModel->insert($data);
            return redirect()->to(site_url('/admin/grupos'));
            session()->setFlashdata("success", "Grupo registrado con éxito");
        } else {
            return view('admin/grupos/create', $data);
        }
    }


    

    public function edit($id = null)
    {
        $data = [
            'grupo' => $this->grupoModel->find($id)
        ];

        return view('admin/grupos/edit', $data);
    }


    

    public function update($id = null)
    {
        $data = [
            'id'            => $this->request->getVar('id'),
            'clave'         => $this->request->getVar('clave'),
            'nombre'        => $this->request->getVar('nombre')
        ];

        $this->grupoModel->update($id, $data);

        return redirect()->to('/admin/grupos');
    }


    

    public function delete($id = null)
    {
        //
    }

}
