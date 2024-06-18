<?php

namespace App\Controllers\Admin;

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

        return view('admin/asignaturas/index', $data);
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
        return view('admin/asignaturas/create', $data);
    }




    public function create()
    {

        $data = [
            'nombre'        => $this->request->getVar('nombre'),
            'clave'         => $this->request->getVar('clave'),
            'descripcion'   => $this->request->getVar('descripcion'),
            // 'carrera'       => $this->request->getVar('carrera'),
            'creditos'      => $this->request->getVar('creditos')
        ];

        $rules = [
            'nombre'    => 'required|is_unique[asignaturas.nombre]',
            'creditos' => 'required'
        ];

        if ($this->validate($rules)) {
            $this->asignaturaModel->insert($data);
            return redirect()->to(site_url('/admin/asignaturas'));
            session()->setFlashdata("success", "Asignatura registrada con éxito");
        } else {
            return view('admin/asignaturas/create', $data);
        }

    }




    public function edit($id = null)
    {
        $data['asignatura'] = $this->asignaturaModel->find($id);

        return view('admin/asignaturas/edit', $data);
    }



    public function update($id = null)
    {
        $data = [
            'nombre'        => $this->request->getVar('nombre'),
            'clave'         => $this->request->getVar('clave'),
            'descripcion'   => $this->request->getVar('descripcion'),
            'creditos'      => $this->request->getVar('creditos')
        ];

        $this->asignaturaModel->update($id, $data);

        return redirect()->to('/admin/asignaturas');
    }



    public function delete($id = null)
    {
        try {
            $this->asignaturaModel->delete($id);
            return redirect()->to('/admin/asignaturas');
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'Cannot delete or update a parent row') !== false) {
                $mensaje =  'No se puede eliminar esta asignatura ya que se encuentra agregada en una carrera, consulte al desarrollador o al administrador del sistema para solucionarlo.';
            } else {
                $mensaje = 'Error al intentar eliminar el registro';
            }
        }
        
    }



}
