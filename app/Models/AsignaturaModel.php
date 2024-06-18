<?php

namespace App\Models;

use CodeIgniter\Model;

class AsignaturaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'asignaturas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['clave', 'nombre', 'carrera', 'descripcion', 'creditos'];

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


    public function getCarreras($carrera_id)
    {
        $carrerasAsignaturasModel = new CarrerasAsignaturasModel();
        $carreras = $carrerasAsignaturasModel->where('carrera', $carrera_id)->findAll();

        $asignaturas = [];
        foreach ($carreras as $carrera) {
            $asignatura = $this->find($carrera['asignatura']);
            $asignaturas[] = $asignatura;
        }

        return $asignaturas;
    }



}
