<?php

namespace App\Controllers\Coordinador;


use CodeIgniter\RESTful\ResourceController;
use App\Models\PeriodoEscolarModel;

class PeriodoEscolarController extends ResourceController
{
    

    protected $periodoEscolarModel;


    public function __construct()
    {
        $this->periodoEscolarModel = new PeriodoEscolarModel();
    }



    public function index()
    {
        $data = [
            'periodos_escolares' => $this->periodoEscolarModel->findAll()
        ];

        return view('coordinador/pescolares/index', $data);
    }

    
    
    public function show($id = null)
    {
        $pe = $this->periodoEscolarModel->find($id);

        $data = [
            'pe' => $pe
        ];

        return view('coordinador/pescolares/show', $data);
    }

    
    
    public function new()
    {
        return view('coordinador/pescolares/create');
    }

    
    
    public function create()
    {
        $data = [
            'nombre'        => $this->request->getPost('nombre'),
            'fecha_inicio'  => $this->request->getPost('fecha_inicio'),
            'fecha_fin'     => $this->request->getPost('fecha_fin')
        ];

        $this->periodoEscolarModel->insert($data);

        return redirect()->to('coordinador/pescolares');
    }

    
    
    public function edit($id = null)
    {
        $pe = $this->periodoEscolarModel->find($id);

        $data = [
            'pe' => $pe
        ];

        return view('coordinador/pescolares/edit', $data);
    }

    
    
    public function update($id = null)
    {
        $data = [
            'id'            => $this->request->getPost('id'),
            'nombre'        => $this->request->getPost('nombre'),
            'fecha_inicio'  => $this->request->getPost('fecha_inicio'),
            'fecha_fin'     => $this->request->getPost('fecha_fin')
        ];

        $this->periodoEscolarModel->update($id, $data);

        return redirect()->to('coordinador/pescolares');
    }

    
    
    public function delete($id = null)
    {
        $this->periodoEscolarModel->delete($id);
        
        return redirect()->to('coordinador/pescolares');
    }

}
