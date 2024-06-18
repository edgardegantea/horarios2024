<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['rol', 'nombre', 'apaterno', 'amaterno', 'estatusDD', 'condicion', 'rfc', 'username', 'email', 'password', 'sexo', 'fechaNacimiento', 'status', 'numHoras', 'carrera', 'reset_token', 'reset_expiration'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function buscarUsuarios($searchTerm)
    {
        return $this->like('apaterno', $searchTerm)
                    ->orWhere('nombre', $searchTerm)
                    ->orWhere('email', $searchTerm)
                    ->findAll();
    }



    public function getCarreras($carrera_id)
    {
        $docentesCarrerasModel = new DocentesCarrerasModel();
        $carreras = $docentesCarrerasModel->where('carrera', $carrera_id)->findAll();

        $docentes = [];
        foreach ($carreras as $carrera) {
            $docente = $this->find($carrera['docente']);
            $docentes[] = $docente;
        }

        return $docentes;
    }



    public function getDocentesPorCarrera($carreraId)
    {
        return $this->where('carrera', $carreraId)->findAll();
    }



}
