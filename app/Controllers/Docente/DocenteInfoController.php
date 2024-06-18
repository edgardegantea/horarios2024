<?php

namespace App\Controllers\Docente;

use App\Controllers\BaseController;
use App\Models\DocenteInfoModel;
use App\Models\DocenteModel;
use App\Models\EstatusDelPersonalModel;
use App\Models\UsuarioModel;

class DocenteInfoController extends BaseController
{

    public function index()
    {
        $this->session = \Config\Services::session();
        $model = new DocenteInfoModel();
        $data = [
            'docenteinfo' => $model->where('id', $this->session->id)->findAll(),
        ];
        return view('docente/docenteinfo/index', $data);
    }

    public function create()
    {
        return view('docente/docenteinfo/create');
    }

    public function store()
    {
        $this->session = \Config\Services::session();
        $model = new DocenteinfoModel();
        $data = [
            'id'            => $this->session->id,
            'calle'         => $this->request->getVar('calle'),
            'numInterior'   => $this->request->getVar('numInterior'),
            'municipio'     => $this->request->getVar('municipio'),
            'estado'        => $this->request->getVar('estado'),
        ];
        $model->insert($data);

        return redirect()->to('/docente/docenteinfo');
    }

    public function edit($id = null)
    {
        $model = new DocenteinfoModel();
        $data = [
            'docenteinfo' => $model->find($id),
        ];

        return view('docente/docenteinfo/edit', $data);
    }

    public function update()
    {
        $model = new DocenteinfoModel();
        $id = $this->request->getVar('id');
        $data = [
            'calle' => $this->request->getVar('calle'),
            'numInterior' => $this->request->getVar('numInterior'),
            'municipio' => $this->request->getVar('municipio'),
            'estado' => $this->request->getVar('estado'),
        ];
        $model->update($id, $data);

        return redirect()->to('/docenteinfo');
    }

    public function delete($id = null)
    {
        $model = new DocenteinfoModel();
        $model->delete($id);

        return redirect()->to('/docenteinfo');
    }

}
