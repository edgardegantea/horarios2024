<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstatusDelPersonalModel;

class EstatusDelPersonalController extends BaseController
{
    
    protected $estatusDelPersonalModel;


    public function __construct()
    {
        $this->estatusDelPersonalModel = new EstatusDelPersonalModel();
    }


    public function index()
    {
        $data['estatusDelPersonal'] = $this->estatusDelPersonalModel->getEstatusDelPersonal();

        return view('estatusDelPersonal/index', $data);
    }
}
