<?php

namespace App\Controllers\Coordinador;

use App\Controllers\BaseController;
use App\Models\ProgramacionModel;
use App\Models\AsignaturaModel;
use App\Models\CarreraModel;
use App\Models\UsuarioModel;
use App\Models\CarrerasAsignaturasModel;
use App\Models\DocentesCarrerasModel;
use App\Models\GrupoModel;
use App\Models\PeriodoEscolarModel;

class ProgramacionController extends BaseController
{

    protected $usuarioModel;
    protected $carreraModel;
    protected $asignaturaModel;
    protected $programacionModel;
    protected $docentesCarrerasModel;
    protected $carrerasAsignaturasModel;
    protected $grupoModel;


    public function __construct()
    {
        $this->programacionModel = new ProgramacionModel();
        $this->usuarioModel = new UsuarioModel();
        $this->carreraModel = new CarreraModel();
        $this->asignaturaModel = new AsignaturaModel();
        $this->docentesCarrerasModel = new DocentesCarrerasModel();
        $this->carrerasAsignaturasModel = new CarrerasAsignaturasModel();
        $this->grupoModel = new GrupoModel();
    }



    public function index()
    {
        $this->session = \Config\Services::session();
        $db = \Config\Database::connect();
        $horarios = $db->query('select p.*, concat(a.clave, " ", a.nombre) as asignatura, concat(d.nombre, " ", d.apaterno, " ", d.amaterno) as docente from programacion as p join asignaturas as a on p.materia_id = a.id left join usuarios as d on p.docente_id = d.id left join carreras as c on p.carrera_id = c.id join usuarios as u on c.coordinador = u.id where u.id =' . $this->session->id)->getResultArray();

        $carrera_id = $db->query('select p.carrera_id from programacion as p join carreras as c on p.carrera_id = c.id left join usuarios as u on c.coordinador = u.id where u.id = ' . $this->session->id)->getResultArray();


        $nombreCarrera = $db->query('select p.carrera_id, c.nombre from programacion as p join carreras as c on p.carrera_id = c.id left join usuarios as u on c.coordinador = u.id where u.id = ' . $this->session->id)->getResultArray();

        $data = [
            'asignaciones'  => $horarios,
            'carrera_id'    => $carrera_id,
            'nombreCarrera' => $nombreCarrera
        ];

        return view('coordinador/programacion/index', $data);
    }




    public function create($carrera_id)
    {
        $docenteModel = new UsuarioModel();
        $asignaturaModel = new AsignaturaModel();
        $programacionModel = new ProgramacionModel();
        $periodoEscolarModel = new PeriodoEscolarModel();

        $data['docentes'] = $docenteModel->getCarreras($carrera_id);
        $data['asignaturas'] = $asignaturaModel->getCarreras($carrera_id);
        $data['carrera_id'] = $carrera_id;
        $data['periodoescolar'] = $periodoEscolarModel->orderBy('id', 'ASC')->findAll();

        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'docente' => 'required',
                'asignatura' => 'required'
            ];

            if ($this->validate($validationRules)) {
                $hora_inicio1 = $this->request->getPost('hora_inicio1');
                $hora_inicio2 = $this->request->getPost('hora_inicio2');
                $hora_inicio3 = $this->request->getPost('hora_inicio3');
                $hora_inicio4 = $this->request->getPost('hora_inicio4');
                $hora_inicio5 = $this->request->getPost('hora_inicio5');
                $hora_inicio6 = $this->request->getPost('hora_inicio6');
                $hora_inicio7 = $this->request->getPost('hora_inicio7');

                $hora_fin1 = $this->request->getPost('hora_fin1');
                $hora_fin2 = $this->request->getPost('hora_fin2');
                $hora_fin3 = $this->request->getPost('hora_fin3');
                $hora_fin4 = $this->request->getPost('hora_fin4');
                $hora_fin5 = $this->request->getPost('hora_fin5');
                $hora_fin6 = $this->request->getPost('hora_fin6');
                $hora_fin7 = $this->request->getPost('hora_fin7');
                

                $dia_semana1 = $this->request->getPost('dia_semana1');
                $dia_semana2 = $this->request->getPost('dia_semana2');
                $dia_semana3 = $this->request->getPost('dia_semana3');
                $dia_semana4 = $this->request->getPost('dia_semana4');
                $dia_semana5 = $this->request->getPost('dia_semana5');
                $dia_semana6 = $this->request->getPost('dia_semana6');
                $dia_semana7 = $this->request->getPost('dia_semana7');
                

                $periodo_academico = $this->request->getPost('periodo_academico'); 
                $grupo = $this->request->getPost('grupo');
                $fechaInicioModular = $this->request->getPost('fecha_inicio_modular');
                $fechaFinModular = $this->request->getPost('fecha_fin_modular');

                $programacionModel->save([
                    'carrera_id' => $carrera_id,
                    'docente_id' => $this->request->getPost('docente'),
                    'materia_id' => $this->request->getPost('asignatura'),

                    'hora_inicio1' => $hora_inicio1,
                    'hora_inicio2' => $hora_inicio2,
                    'hora_inicio3' => $hora_inicio3,
                    'hora_inicio4' => $hora_inicio4,
                    'hora_inicio5' => $hora_inicio5,
                    'hora_inicio6' => $hora_inicio6,

                    'hora_fin1' => $hora_fin1,
                    'hora_fin2' => $hora_fin2,
                    'hora_fin3' => $hora_fin3,
                    'hora_fin4' => $hora_fin4,
                    'hora_fin5' => $hora_fin5,
                    'hora_fin6' => $hora_fin6,

                    'dia_semana1' => $dia_semana1,
                    'dia_semana2' => $dia_semana2,
                    'dia_semana3' => $dia_semana3,
                    'dia_semana4' => $dia_semana4,
                    'dia_semana5' => $dia_semana5,
                    'dia_semana6' => $dia_semana6,

                    'grupo' => $grupo,
                    'periodo_academico' => $periodo_academico,
                    'fecha_inicio_modular' => $fechaInicioModular,
                    'fecha_fin_modular' => $fechaFinModular
                ]);


                return redirect()->to("/coordinador/programacion/index/{$carrera_id}")->with('success', 'Asignación de horario guardada exitosamente.');
            } else {
                return redirect()->to("/coordinador/programacion/create/{$carrera_id}")->withInput()->with('errors', $this->validator->getErrors());
            }
        }

        return view('coordinador/programacion/create', $data);
    }






    public function update($programacion_id)
    {
        $docenteModel = new UsuarioModel();
        $asignaturaModel = new AsignaturaModel();
        $programacionModel = new ProgramacionModel();
        $periodoEscolarModel = new PeriodoEscolarModel();

        $programacion = $programacionModel->find($programacion_id);

        if ($programacion === null) {
            return redirect()->to('/coordinador/programacion')->with('error', 'Programación no encontrada.');
        }

        $carrera_id = $programacion['carrera_id'];

        $data['docentes'] = $docenteModel->getCarreras($carrera_id);
        $data['asignaturas'] = $asignaturaModel->getCarreras($carrera_id);
        $data['carrera_id'] = $carrera_id;
        $data['asignacion'] = $programacion;
        $data['periodoescolar'] = $periodoEscolarModel->orderBy('id', 'ASC')->findAll();

        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'docente' => 'required',
                'asignatura' => 'required',
            ];


            if ($this->validate($validationRules)) {
                $postData = $this->request->getPost();

                if (isset($postData['nullify_dates'])) {
                    $postData['fecha_inicio_modular'] = null;
                    $postData['fecha_fin_modular'] = null;
                }

                $programacionModel->update($programacion_id, $postData);

                return redirect()->to("/coordinador/programacion/index/{$carrera_id}")->with('success', 'Asignación de horario actualizada exitosamente.');
            } else {
                return redirect()->to("/coordinador/programacion/update/{$programacion_id}")->withInput()->with('errors', $this->validator->getErrors());
            }
        }

        return view('coordinador/programacion/update', $data);
    }




    public function delete($asignacion_id)
    {
        $programacionModel = new ProgramacionModel();
        $asignacion = $programacionModel->find($asignacion_id);
        if (!$asignacion) {
            return redirect()->to('/coordinador/programacion')->with('error', 'Asignación no encontrada.');
        }

        $programacionModel->delete($asignacion_id);

        return redirect()->to('/coordinador/programacion')->with('success', 'Asignación eliminada exitosamente.');
    }


}
