<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpedienteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'expedientes';
    protected $primaryKey       = 'docente';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'docente', 
        'bio', 
        'licenciatura', 
        'lic_num_cedula', 
        'licenciatura_cedula', 
        'fecha_titulacion_lic', 
        'maestria', 
        'mae_num_cedula', 
        'maestria_cedula', 
        'fecha_titulacion_mae', 
        'doctorado', 
        'doc_num_cedula', 
        'doctorado_cedula', 
        'fecha_titulacion_doc', 
        'articulo1', 
        // 'evidencia_articulo1', 
        'fecha_pub_articulo1', 
        'articulo2', 
        // 'evidencia_articulo2', 
        'fecha_pub_articulo2', 
        'articulo3', 
        // 'evidencia_articulo3', 
        'fecha_pub_articulo3', 
        'curso1', 
        // 'evidencia_curso1', 
        'fecha_curso1', 
        'curso2', 
        // 'evidencia_curso2', 
        'fecha_curso2', 
        'curso3', 
        // 'evidencia_curso3', 
        'fecha_curso3', 
        'curso4', 
        // 'evidencia_curso4', 
        'fecha_curso4', 
        'ponencia1', 
        // 'evidencia_ponencia1', 
        'fecha_ponencia1', 
        'ponencia2', 
        // 'evidencia_ponencia2', 
        'fecha_ponencia2', 
        'ponencia3', 
        // 'evidencia_ponencia3', 
        'fecha_ponencia3', 
        'certificacion1', 
        // 'evidencia_cert1', 
        'fecha_certificacion1', 
        'certificacion2', 
        // 'evidencia_cert2', 
        'fecha_certificacion2', 
        'certificacion3', 
        // 'evidencia_cert3', 
        'fecha_certificacion3', 
        'certificacion4', 
        // 'evidencia_cert4', 
        'fecha_certificacion4', 
        'experiencia_adicional'
    ];


    /*protected $table = 'expedientes';
    protected $primaryKey = 'docente';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['bio', 'licenciatura', 'licenciatura_cedula', 'fecha_titulacion_lic', 'maestria', 'maestria_cedula', 'fecha_titulacion_mae', 'doctorado', 'doctorado_cedula', 'fecha_titulacion_doc', 'curso1', 'fecha_curso1', 'curso2', 'fecha_curso2', 'curso3', 'fecha_curso3', 'curso4', 'fecha_curso4', 'certificacion1', 'fecha_certificacion1', 'certificacion2', 'fecha_certificacion2', 'certificacion3', 'fecha_certificacion3', 'certificacion4', 'fecha_certificacion4', 'experiencia_adicional'];*/

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



    public function getExpedientes()
    {
        return $this->findAll();
    }


}
