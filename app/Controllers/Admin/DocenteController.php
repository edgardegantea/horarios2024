<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DocenteModel;
use App\Models\DocenteInfoModel;
use App\Models\EstatusDelPersonalModel;

class DocenteController extends BaseController
{

    protected $docenteModel;
    protected $EstatusDelPersonalModel;

    public function __construct()
    {
        $this->docenteModel = new DocenteModel();
        $this->estatusDelPersonalModel = new EstatusDelPersonalModel();
    }



    public function index()
    {
        $db = \Config\Database::connect();
        $estatusdd = $db->query('select e.nombre as status from estatus_del_personal as e join docentes as d on d.estatus = e.id')->getResultArray();

        $docentes = $db->query('select d.id, d.usuario, d.horas_asignadas, di.nombre, di.aPaterno, di.aMaterno, di.genero, exp.docente, exp.licenciatura as licenciatura, exp.maestria, exp.doctorado, edp.nombre as estatus from docentes as d join docenteinfo as di on d.id = di.id join expedientes as exp on d.id = exp.docente join estatus_del_personal as edp on d.estatus = edp.id')->getResultArray();

        // $data['docentes'] = $this->docenteModel->getDocentes();
        $data['docentes'] = $docentes;
        $data['estatusDelDocente'] = $this->docenteModel->getEstatusDelDocente();
        $data['estatusdd'] = $estatusdd;

        return view('docentes/index', $data);
    }



    public function create()
    {
        helper('form');

        $data['estatusDelPersonal'] = $this->estatusDelPersonalModel->getEstatusDelPersonal();

        return view('docentes/create', $data);
    }



    public function store()
    {
        $docenteModel = new DocenteModel();


        if ($this->request->getMethod() === 'post' && $this->validate([
            'usuario' => 'required|min_length[5]|max_length[20]',
            'password' => 'required|min_length[5]|max_length[20]',
            'horas_asignadas' => 'required',
        ])) {
            $docenteModel->save([
                'usuario'           => $this->request->getPost('usuario'),
                'password'          => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'horas_asignadas'   => $this->request->getPost('horas_asignadas'),
                'estatus'           => $this->request->getPost('estatus')
            ]);

            return redirect()->to('/admin/docentes');
        } else {
            $data['estatusDelPersonal'] = $this->estatusDelPersonalModel->getEstatusDelPersonal();
            return view('admin/docentes/create', $data);
        }

    }


    public function exportarSQL()
    {
        $db = \Config\Database::connect();
        // ...
    }


    public function delete($id)
    {
        $this->docenteModel->delete($id);
        return redirect()->to(base_url('/admin/docentes'));
    }


    public function informacionDelDocente() {
        $db = \Config\Database::connect();

        $informacionDelDocente = $db->query('select usuarios.*, expedientes.* from usuarios join expedientes on usuarios.id = expedientes.docente')->getResultArray();

        $data = [
            'idd' => $informacionDelDocente
        ];

        return view('admin/docentes/dinfo', $data);
    }
}
