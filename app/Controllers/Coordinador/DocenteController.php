<?php

namespace App\Controllers\Coordinador;

use App\Controllers\BaseController;
use App\Models\CarreraModel;
use App\Models\DocenteModel;
use App\Models\DocenteInfoModel;
use App\Models\EstatusDelPersonalModel;
use App\Models\UsuarioModel;

class DocenteController extends BaseController
{

    protected $docenteModel;
    protected $EstatusDelPersonalModel;
    protected $carreraModel;
    protected $usuarioModel;


    public function __construct()
    {
        $this->docenteModel = new DocenteModel();
        $this->estatusDelPersonalModel = new EstatusDelPersonalModel();
        $this->carreraModel = new CarreraModel();
        $this->usuarioModel = new UsuarioModel();
    }



    public function index()
    {
        $db = \Config\Database::connect();
        $estatusdd = $db->query('select e.nombre as status from estatus_del_personal as e join docentes as d on d.estatus = e.id')->getResultArray();

        $docentes = $db->query('select d.id, d.usuario, d.horas_asignadas, di.nombre, di.aPaterno, di.aMaterno, di.genero, exp.docente, exp.licenciatura, edp.nombre as estatus from docentes as d join docenteinfo as di on d.id = di.id join expedientes as exp on d.id = exp.docente join estatus_del_personal as edp on d.estatus = edp.id')->getResultArray();

        // $data['docentes'] = $this->docenteModel->getDocentes();
        $data['docentes'] = $docentes;
        $data['estatusDelDocente'] = $this->docenteModel->getEstatusDelDocente();
        $data['estatusdd'] = $estatusdd;


        $this->session = \Config\Services::session();
        $carrera = $this->carreraModel->where('coordinador', $this->session->id)->first();

        $docentes = $this->usuarioModel->where('');


        return view('coordinador/docentes/index', $data);
    }



    public function create()
    {
        helper('form');

        $data['estatusDelPersonal'] = $this->estatusDelPersonalModel->getEstatusDelPersonal();

        return view('coordinador/docentes/create', $data);
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

            return redirect()->to('/coordinador/docentes');
        } else {
            $data['estatusDelPersonal'] = $this->estatusDelPersonalModel->getEstatusDelPersonal();
            return view('coordinador/docentes/create', $data);
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
        return redirect()->to(base_url('/coordinador/docentes'));
    }


    public function informacionDelDocente() {
        $db = \Config\Database::connect();

        $informacionDelDocente = $db->query('select usuarios.*, expedientes.* from usuarios join expedientes on usuarios.id = expedientes.docente')->getResultArray();

        $data = [
            'idd' => $informacionDelDocente
        ];

        return view('coordinador/docentes/dinfo', $data);
    }
}
