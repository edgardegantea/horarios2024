<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramacionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'programacion';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'periodo_academico',
        'materia_id',
        'docente_id',
        'carrera_id',

        'hora_inicio1',
        'hora_inicio2',
        'hora_inicio3',
        'hora_inicio4',
        'hora_inicio5',
        'hora_inicio6',
        'hora_inicio7',


        'hora_fin1',
        'hora_fin2',
        'hora_fin3',
        'hora_fin4',
        'hora_fin5',
        'hora_fin6',
        'hora_fin7',


        'dia_semana1',
        'dia_semana2',
        'dia_semana3',
        'dia_semana4',
        'dia_semana5',
        'dia_semana6',
        'dia_semana7',


        'grupo', 'fecha_inicio_modular', 'fecha_fin_modular'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getAssignmentsForWeek()
    {
        // Calcula la fecha de inicio y fin de la semana actual
        $currentDate = date('Y-m-d');
        $startDate = date('Y-m-d', strtotime('last Monday', strtotime($currentDate)));
        $endDate = date('Y-m-d', strtotime('next Sunday', strtotime($currentDate)));

        // Consulta la base de datos para obtener las asignaciones de la semana
        $assignments = $this->programacionModel
            ->select('programacion.*, periodo_escolar.fecha_inicio as finicio, periodo_escolar.fecha_fin as ffin')
            ->join('periodo_escolar', 'programacion.periodo_academico = periodo_escolar.id', 'left')
            ->where('dia_semana >=', 1) // Ajusta los valores según tus necesidades
            ->where('dia_semana <=', 6) // para representar los días de la semana
            ->where('hora_inicio >=', '08:00:00') // Hora de inicio de 8 am
            ->where('hora_fin <=', '20:00:00') // Hora de fin de 8 pm
            ->where('fecha >=', $startDate)
            ->where('fecha <=', $endDate)
            ->findAll();

        return $assignments;
    }


    public function carrera()
    {
        return $this->belongsTo('App\Models\CarreraModel', 'carrera_id');
    }



    public function getAsignacionesPorCarrera($carrera_id)
    {
        // return $this->where('carrera_id', $carrera_id)->findAll();
        return $this->select('programacion.*, concat(usuarios.nombre, " ", usuarios.apaterno, " ", usuarios.amaterno) as docente, asignaturas.nombre as asignatura')
            ->join('usuarios', 'usuarios.id = programacion.docente_id', 'left')
            ->join('asignaturas', 'asignaturas.id = programacion.materia_id', 'left')
            ->where('carrera_id', $carrera_id)
            ->findAll();
    }

    public function getAsignacionesPorDocente($docente_id)
    {
        return $this->select('programacion.*, usuarios.nombre as docente, asignaturas.nombre as asignatura, carreras.nombre as carrera')
            ->join('usuarios', 'usuarios.id = programacion.docente_id', 'left')
            ->join('asignaturas', 'asignaturas.id = programacion.materia_id', 'left')
            ->join('carreras', 'carreras.id = programacion.carrera_id', 'left')
            ->where('docente_id', $docente_id)
            ->findAll();
    }
    

    public function getAsignacionesPorCarrera2($carrera_id)
    {
        $builder = $this->db->table('programacion');
        $builder->select('programacion.*, usuarios.nombre as docente, asignaturas.nombre as asignatura');
        $builder->join('usuarios', 'usuarios.id = programacion.docente_id');
        $builder->join('asignaturas', 'asignaturas.id = programacion.materia_id');
        $builder->where('programacion.carrera_id', $carrera_id);

        return $builder->get()->getResultArray();
    }


    public function getAsignacionesPorCarrera3($carreraId)
    {
        return $this->where('carrera_id', $carreraId)->findAll();
    }



    public function getAssignmentsByCarrera($carrera_id)
    {
        $this->select('*')
            ->where('carrera_id', $carrera_id);

        return $this->findAll();
    }


    public function getDocentesByCarrera($carrera_id)
    {
        return $this->distinct()
            ->select('docente_id, d.*, a.clave as claveAsignatura, a.nombre as nombreAsignatura')
            ->join('usuarios as d', 'programacion.docente_id = d.id')
            ->join('asignaturas as a', 'programacion.materia_id = a.id')
            ->where('carrera_id', $carrera_id)
            ->findAll();
    }


    /*
    public function getAssignmentsByDocente($docente_id)
    {
        return $this->distinct()->select('a.id as aid, a.clave as claveAsignatura, a.nombre as nombreAsignatura, programacion.*')
             ->join('asignaturas as a', 'programacion.materia_id = a.id')
            // ->join('carreras', 'programacion.carrera_id = carreras.id')
            ->where('programacion.docente_id', $docente_id)->findAll();

        // return $this->where('docente_id', $docente_id)->findAll();
    }
    */


    public function getAssignmentsByDocenteAndCarrera($docente_id, $carrera_id)
    {
        return $this->distinct()->select('a.id as aid, a.clave as claveAsignatura, a.nombre as nombreAsignatura, programacion.*, periodo_escolar.fecha_inicio as finicio, periodo_escolar.fecha_fin as ffin')
            ->join('asignaturas as a', 'programacion.materia_id = a.id')
            ->join('periodo_escolar', 'programacion.periodo_academico = periodo_escolar.id')
            ->where('docente_id', $docente_id)
            ->where('carrera_id', $carrera_id)
            ->findAll();
    }

}
