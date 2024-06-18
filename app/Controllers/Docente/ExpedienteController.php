<?php

namespace App\Controllers\Docente;

use App\Controllers\BaseController;
use App\Models\ExpedienteModel;

class ExpedienteController extends BaseController
{

    protected $expedienteModel;

    public function __construct()
    {
        $this->expedienteModel = new ExpedienteModel();
    }
    

    public function index()
    {
        $this->session = \Config\Services::session();
        $model = new ExpedienteModel();
        $data = [
            'expediente' => $model->where('docente', $this->session->id)->findAll(),
        ];
        return view('docente/expedientes/index', $data);
    }
    

    public function create()
    {
        return view('docente/expedientes/create');
    }

    




    // public function store()
    // {
        
    //     $request = service('request');

    //     $validation = \Config\Services::validation();

    //     $validation->setRules([
    //         'bio' => 'required',
    //         'licenciatura' => 'required',
    //         'licenciatura_cedula' => 'uploaded[licenciatura_cedula]|max_size[licenciatura_cedula,2048]|ext_in[licenciatura_cedula,pdf,jpg,png]',
    //         'fecha_titulacion_lic' => 'valid_date',
    //         'licenciatura_cedula' => 'uploaded[licenciatura_cedula]|max_size[licenciatura_cedula,2048]|ext_in[licenciatura_cedula,pdf,jpg,png]',
    //         'maestria_cedula' => 'uploaded[maestria_cedula]|max_size[maestria_cedula,2048]|ext_in[maestria_cedula,pdf,jpg,png]',
    //         'doctorado_cedula' => 'uploaded[doctorado_cedula]|max_size[doctorado_cedula,2048]|ext_in[doctorado_cedula,pdf,jpg,png]',
    //         /*'evidencia_articulo1' => 'uploaded[evidencia_articulo1]|max_size[evidencia_articulo1,2048]|ext_in[evidencia_articulo1,pdf,jpg,png]',
    //         'evidencia_articulo2' => 'uploaded[evidencia_articulo2]|max_size[evidencia_articulo2,2048]|ext_in[evidencia_articulo2,pdf,jpg,png]',
    //         'evidencia_articulo3' => 'uploaded[evidencia_articulo3]|max_size[evidencia_articulo3,2048]|ext_in[evidencia_articulo3,pdf,jpg,png]',
    //         'evidencia_curso1' => 'uploaded[evidencia_curso1]|max_size[evidencia_curso1,2048]|ext_in[evidencia_curso1,pdf,jpg,png]',
    //         'evidencia_curso2' => 'uploaded[evidencia_curso2]|max_size[evidencia_curso2,2048]|ext_in[evidencia_curso2,pdf,jpg,png]',
    //         'evidencia_curso3' => 'uploaded[evidencia_curso3]|max_size[evidencia_curso3,2048]|ext_in[evidencia_curso3,pdf,jpg,png]',
    //         'evidencia_curso4' => 'uploaded[evidencia_curso4]|max_size[evidencia_curso4,2048]|ext_in[evidencia_curso4,pdf,jpg,png]',
    //         'evidencia_ponencia1' => 'uploaded[evidencia_ponencia1]|max_size[evidencia_ponencia1,2048]|ext_in[evidencia_ponencia1,pdf,jpg,png]',
    //         'evidencia_ponencia2' => 'uploaded[evidencia_ponencia2]|max_size[evidencia_ponencia2,2048]|ext_in[evidencia_ponencia2,pdf,jpg,png]',
    //         'evidencia_ponencia3' => 'uploaded[evidencia_ponencia3]|max_size[evidencia_ponencia3,2048]|ext_in[evidencia_ponencia3,pdf,jpg,png]',
    //         'evidencia_cert1' => 'uploaded[evidencia_cert1]|max_size[evidencia_cert1,2048]|ext_in[evidencia_cert1,pdf,jpg,png]',
    //         'evidencia_cert2' => 'uploaded[evidencia_cert2]|max_size[evidencia_cert2,2048]|ext_in[evidencia_cert2,pdf,jpg,png]',
    //         'evidencia_cert3' => 'uploaded[evidencia_cert3]|max_size[evidencia_cert3,2048]|ext_in[evidencia_cert3,pdf,jpg,png]',
    //         'evidencia_cert4' => 'uploaded[evidencia_cert4]|max_size[evidencia_cert4,2048]|ext_in[evidencia_cert4,pdf,jpg,png]'*/
    //     ]);

    //     if (!$validation->withRequest($this->request)->run()) {
    //         return redirect()->to(site_url('docente/expediente/create'))->withInput()->with('errors', $validation->getErrors());
    //     }

    //     $licenciaturaCedula = $request->getFile('licenciatura_cedula');
    //     $maestriaCedula = $request->getFile('maestria_cedula');
    //     $doctoradoCedula = $request->getFile('doctorado_cedula');
    //     /*$evidencia_articulo1 = $request->getFile('evidencia_articulo1');
    //     $evidencia_articulo2 = $request->getFile('evidencia_articulo2');
    //     $evidencia_articulo3 = $request->getFile('evidencia_articulo3');
    //     $evidencia_curso1 = $request->getFile('evidencia_curso1');
    //     $evidencia_curso2 = $request->getFile('evidencia_curso2');
    //     $evidencia_curso3 = $request->getFile('evidencia_curso3');
    //     $evidencia_curso4 = $request->getFile('evidencia_curso4');
    //     $evidencia_ponencia1 = $request->getFile('evidencia_ponencia1');
    //     $evidencia_ponencia2 = $request->getFile('evidencia_ponencia2');
    //     $evidencia_ponencia3 = $request->getFile('evidencia_ponencia3');
    //     $evidencia_cert1 = $request->getFile('evidencia_cert1');
    //     $evidencia_cert2 = $request->getFile('evidencia_cert2');
    //     $evidencia_cert3 = $request->getFile('evidencia_cert3');
    //     $evidencia_cert4 = $request->getFile('evidencia_cert4');*/






    //     if ($licenciaturaCedula->isValid() && !$licenciaturaCedula->hasMoved()) {
    //         $newLicenciaturaCedula = $licenciaturaCedula->getRandomName();
    //     }
        
    //     if ($request->getFile('maestria_cedula')->isValid()) {
    //         $maestriaCedula = $request->getFile('maestria_cedula');
    //         $maestriaCedula->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('doctorado_cedula')->isValid()) {
    //         $doctoradoCedula = $request->getFile('doctorado_cedula');
    //         $doctoradoCedula->move(WRITEPATH . 'uploads');
    //     }

    //     /*if ($request->getFile('evidencia_articulo1')->isValid()) {
    //         $evidencia_articulo1 = $request->getFile('evidencia_articulo1');
    //         $evidencia_articulo1->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_articulo2')->isValid()) {
    //         $evidencia_articulo2 = $request->getFile('evidencia_articulo2');
    //         $evidencia_articulo2->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_articulo3')->isValid()) {
    //         $evidencia_articulo3 = $request->getFile('evidencia_articulo3');
    //         $evidencia_articulo3->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_curso1')->isValid()) {
    //         $evidencia_curso1 = $request->getFile('evidencia_curso1');
    //         $evidencia_curso1->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_curso2')->isValid()) {
    //         $evidencia_curso2 = $request->getFile('evidencia_curso2');
    //         $evidencia_curso2->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_curso3')->isValid()) {
    //         $evidencia_curso3 = $request->getFile('evidencia_curso3');
    //         $evidencia_curso3->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_curso4')->isValid()) {
    //         $evidencia_curso4 = $request->getFile('evidencia_curso4');
    //         $evidencia_curso4->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_ponencia1')->isValid()) {
    //         $evidencia_ponencia1 = $request->getFile('evidencia_ponencia1');
    //         $evidencia_ponencia1->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_ponencia2')->isValid()) {
    //         $evidencia_ponencia2 = $request->getFile('evidencia_ponencia2');
    //         $evidencia_ponencia2->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_ponencia3')->isValid()) {
    //         $evidencia_ponencia3 = $request->getFile('evidencia_ponencia3');
    //         $evidencia_ponencia3->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_cert1')->isValid()) {
    //         $evidencia_cert1 = $request->getFile('evidencia_cert1');
    //         $evidencia_cert1->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_cert2')->isValid()) {
    //         $evidencia_cert2 = $request->getFile('evidencia_cert2');
    //         $evidencia_cert2->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_cert3')->isValid()) {
    //         $evidencia_cert3 = $request->getFile('evidencia_cert3');
    //         $evidencia_cert3->move(WRITEPATH . 'uploads');
    //     }

    //     if ($request->getFile('evidencia_cert4')->isValid()) {
    //         $evidencia_cert4 = $request->getFile('evidencia_cert4');
    //         $evidencia_cert4->move(WRITEPATH . 'uploads');
    //     }*/



    //     $licenciaturaCedula->move(WRITEPATH . 'uploads', $newLicenciaturaCedula);



    //     $data = [
    //         'docente'               => $this->session->id,
    //         'bio'                   => $request->getPost('bio'),
    //         'licenciatura'          => $request->getPost('licenciatura'),
    //         'lic_num_cedula'        => $request->getPost('lic_num_cedula'),
    //         'licenciatura_cedula'   => $newLicenciaturaCedula,
    //         'fecha_titulacion_lic'  => $request->getPost('fecha_titulacion_lic'),
    //         'maestria'              => $request->getPost('maestria'),
    //         'mae_num_cedula'        => $request->getPost('mae_num_cedula'),
    //         'maestria_cedula'       => $maestriaCedula ? $maestriaCedula->getRandomName() : null,
    //         'fecha_titulacion_mae'  => $request->getPost('fecha_titulacion_mae'),
    //         'doctorado'             => $request->getPost('doctorado'),
    //         'doc_num_cedula'        => $request->getPost('doc_num_cedula'),
    //         'doctorado_cedula'      => $doctoradoCedula ? $doctoradoCedula->getRandomName() : null,
    //         'fecha_titulacion_doc'  => $request->getPost('fecha_titulacion_doc'),

    //         'articulo1'             => $request->getPost('articulo1'),
    //         // 'evidencia_articulo1'   => $evidencia_articulo1 ? $evidencia_articulo1->getRandomName() : null,
    //         'fecha_pub_articulo1'   => $request->getPost('fecha_pub_articulo1'),
    //         'articulo2'             => $request->getPost('articulo2'),
    //         // 'evidencia_articulo2'   => $evidencia_articulo2 ? $evidencia_articulo2->getRandomName() : null,
    //         'fecha_pub_articulo2'   => $request->getPost('fecha_pub_articulo2'),
    //         'articulo3'             => $request->getPost('articulo3'),
    //         // 'evidencia_articulo3'   => $evidencia_articulo3 ? $evidencia_articulo3->getRandomName() : null,
    //         'fecha_pub_articulo3'   => $request->getPost('fecha_pub_articulo3'),
            
    //         'curso1'                => $request->getPost('curso1'),
    //         // 'evidencia_curso1'      => $evidencia_curso1 ? $evidencia_curso1->getRandomName() : null,
    //         'fecha_curso1'          => $request->getPost('fecha_curso1'),
    //         'curso2'                => $request->getPost('curso2'),
    //         // 'evidencia_curso2'      => $evidencia_curso2 ? $evidencia_curso2->getRandomName() : null,
    //         'fecha_curso2'          => $request->getPost('fecha_curso2'),
    //         'curso3'                => $request->getPost('curso3'),
    //         // 'evidencia_curso3'      => $evidencia_curso3 ? $evidencia_curso3->getRandomName() : null,
    //         'fecha_curso3'          => $request->getPost('fecha_curso3'),
    //         'curso4'                => $request->getPost('curso4'),
    //         // 'evidencia_curso4'      => $evidencia_curso4 ? $evidencia_curso4->getRandomName() : null,
    //         'fecha_curso4'          => $request->getPost('fecha_curso4'),

            
            
    //         'ponencia1'             => $request->getPost('ponencia1'),
    //         // 'evidencia_ponencia1'   => $evidencia_ponencia1 ? $evidencia_ponencia1->getRandomName() : null,
    //         'fecha_ponencia1'       => $request->getPost('fecha_ponencia1'),
    //         'ponencia2'             => $request->getPost('ponencia2'),
    //         // 'evidencia_ponencia2'   => $evidencia_ponencia2 ? $evidencia_ponencia2->getRandomName() : null,
    //         'fecha_ponencia2'       => $request->getPost('fecha_ponencia2'),
    //         'ponencia3'             => $request->getPost('ponencia3'),
    //         // 'evidencia_ponencia3'   => $evidencia_ponencia3 ? $evidencia_ponencia3->getRandomName() : null,
    //         'fecha_ponencia3'       => $request->getPost('fecha_ponencia3'),
            




    //         'certificacion1'        => $request->getPost('certificacion1'),
    //         // 'evidencia_cert1'       => $evidencia_cert1 ? $evidencia_cert1->getRandomName() : null,
    //         'fecha_certificacion1'  => $request->getPost('fecha_certificacion1'),
    //         'certificacion2'        => $request->getPost('certificacion2'),
    //         // 'evidencia_cert2'       => $evidencia_cert2 ? $evidencia_cert2->getRandomName() : null,
    //         'fecha_certificacion2'  => $request->getPost('fecha_certificacion2'),
    //         'certificacion3'        => $request->getPost('certificacion3'),
    //         // 'evidencia_cert3'       => $evidencia_cert3 ? $evidencia_cert3->getRandomName() : null,
    //         'fecha_certificacion3'  => $request->getPost('fecha_certificacion3'),
    //         'certificacion4'        => $request->getPost('certificacion4'),
    //         // 'evidencia_cert4'       => $evidencia_cert4 ? $evidencia_cert4->getRandomName() : null,
    //         'fecha_certificacion4'  => $request->getPost('fecha_certificacion4'),
            

    //         'experiencia_adicional' => $request->getPost('experiencia_adicional')

    //     ];

    //     $this->expedienteModel->insert($data);

    //     return redirect()->to(site_url('docente/expediente'))->with('success', 'Expediente creado exitosamente');
        
    // }



public function store()
{
    $model = new ExpedienteModel();
    $this->session = \Config\Services::session();
    
    // Recopilar los datos del formulario
    $data = [
        'docente' => $this->session->id,
        'bio' => $this->request->getPost('bio'),
        'licenciatura' => $this->request->getPost('licenciatura'),
        'lic_num_cedula' => $this->request->getPost('lic_num_cedula'),
        // 'licenciatura_cedula' => $this->request->getPost('licenciatura_cedula'),
        'fecha_titulacion_lic' => $this->request->getPost('fecha_titulacion_lic'),
        'maestria' => $this->request->getPost('maestria'),
        'mae_num_cedula' => $this->request->getPost('mae_num_cedula'),
        // 'maestria_cedula' => $this->request->getPost('maestria_cedula'),
        'fecha_titulacion_mae' => $this->request->getPost('fecha_titulacion_mae'),
        'doctorado' => $this->request->getPost('doctorado'),
        'doc_num_cedula' => $this->request->getPost('doc_num_cedula'),
        // 'doctorado_cedula' => $this->request->getPost('doctorado_cedula'),
        'fecha_titulacion_doc' => $this->request->getPost('fecha_titulacion_doc'),
        'articulo1' => $this->request->getPost('articulo1'),
        // 'evidencia_articulo1' => $this->request->getPost('evidencia_articulo1'),
        'fecha_pub_articulo1' => $this->request->getPost('fecha_pub_articulo1'),
        'articulo2' => $this->request->getPost('articulo2'),
        // 'evidencia_articulo2' => $this->request->getPost('evidencia_articulo2'),
        'fecha_pub_articulo2' => $this->request->getPost('fecha_pub_articulo2'),
        'articulo3' => $this->request->getPost('articulo3'),
        // 'evidencia_articulo3' => $this->request->getPost('evidencia_articulo3'),
        'fecha_pub_articulo3' => $this->request->getPost('fecha_pub_articulo3'),
        'curso1' => $this->request->getPost('curso1'),
        // 'evidencia_curso1' => $this->request->getPost('evidencia_curso1'),
        'fecha_curso1' => $this->request->getPost('fecha_curso1'),
        'curso2' => $this->request->getPost('curso2'),
        // 'evidencia_curso2' => $this->request->getPost('evidencia_curso2'),
        'fecha_curso2' => $this->request->getPost('fecha_curso2'),
        'curso3' => $this->request->getPost('curso3'),
        // 'evidencia_curso3' => $this->request->getPost('evidencia_curso3'),
        'fecha_curso3' => $this->request->getPost('fecha_curso3'),
        'curso4' => $this->request->getPost('curso4'),
        // 'evidencia_curso4' => $this->request->getPost('evidencia_curso4'),
        'fecha_curso4' => $this->request->getPost('fecha_curso4'),
        'ponencia1' => $this->request->getPost('ponencia1'),
        // 'evidencia_ponencia1' => $this->request->getPost('evidencia_ponencia1'),
        'fecha_ponencia1' => $this->request->getPost('fecha_ponencia1'),
        'ponencia2' => $this->request->getPost('ponencia2'),
        // 'evidencia_ponencia2' => $this->request->getPost('evidencia_ponencia2'),
        'fecha_ponencia2' => $this->request->getPost('fecha_ponencia2'),
        'ponencia3' => $this->request->getPost('ponencia3'),
        // 'evidencia_ponencia3' => $this->request->getPost('evidencia_ponencia3'),
        'fecha_ponencia3' => $this->request->getPost('fecha_ponencia3'),
        'certificacion1' => $this->request->getPost('certificacion1'),
        // 'evidencia_cert1' => $this->request->getPost('evidencia_cert1'),
        'fecha_certificacion1' => $this->request->getPost('fecha_certificacion1'),
        'certificacion2' => $this->request->getPost('certificacion2'),
        // 'evidencia_cert2' => $this->request->getPost('evidencia_cert2'),
        'fecha_certificacion2' => $this->request->getPost('fecha_certificacion2'),
        'certificacion3' => $this->request->getPost('certificacion3'),
        // 'evidencia_cert3' => $this->request->getPost('evidencia_cert3'),
        'fecha_certificacion3' => $this->request->getPost('fecha_certificacion3'),
        'certificacion4' => $this->request->getPost('certificacion4'),
        // 'evidencia_cert4' => $this->request->getPost('evidencia_cert4'),
        'fecha_certificacion4' => $this->request->getPost('fecha_certificacion4'),
        'experiencia_adicional' => $this->request->getPost('experiencia_adicional')
    ];

    // Validar los datos si es necesario

    if ($model->save($data)) {
        return redirect()->to('docente/expediente')->with('success', 'Expediente creado con éxito');
    } else {
        return redirect()->back()->withInput()->with('error', 'Error al crear el expediente');
    }
}










    public function edit($id)
    {
        $model = new ExpedienteModel();
        $data['expediente'] = $model->find($id);

        if ($data['expediente'] === null) {
            return redirect()->to('docente/expediente')->with('error', 'Expediente no encontrado');
        }

        // Cargar la vista de edición con los datos del expediente
        return view('docente/expedientes/edit', $data);
    }




    public function update()
    {
        $model = new ExpedienteModel();

        // $id = $this->request->getPost('docente'); // Obtén el ID del expediente a actualizar
        $this->session = \Config\Services::session();

        // Verificar si el expediente existe
        $existingExpediente = $model->find($this->session->id);

        if ($existingExpediente === null) {
            return redirect()->to('docente/expediente')->with('error', 'Expediente no encontrado');
        }

        // Recopilar los datos del formulario
        $data = [
            // 'docente' => $this->request->getPost('docente'),
            'bio' => $this->request->getPost('bio'),
            'licenciatura' => $this->request->getPost('licenciatura'),
            'lic_num_cedula' => $this->request->getPost('lic_num_cedula'),
            // 'licenciatura_cedula' => $this->request->getPost('licenciatura_cedula'),
            'fecha_titulacion_lic' => $this->request->getPost('fecha_titulacion_lic'),
            'maestria' => $this->request->getPost('maestria'),
            'mae_num_cedula' => $this->request->getPost('mae_num_cedula'),
            // 'maestria_cedula' => $this->request->getPost('maestria_cedula'),
            'fecha_titulacion_mae' => $this->request->getPost('fecha_titulacion_mae'),
            'doctorado' => $this->request->getPost('doctorado'),
            'doc_num_cedula' => $this->request->getPost('doc_num_cedula'),
            // 'doctorado_cedula' => $this->request->getPost('doctorado_cedula'),
            'fecha_titulacion_doc' => $this->request->getPost('fecha_titulacion_doc'),
            'articulo1' => $this->request->getPost('articulo1'),
            // 'evidencia_articulo1' => $this->request->getPost('evidencia_articulo1'),
            'fecha_pub_articulo1' => $this->request->getPost('fecha_pub_articulo1'),
            'articulo2' => $this->request->getPost('articulo2'),
            // 'evidencia_articulo2' => $this->request->getPost('evidencia_articulo2'),
            'fecha_pub_articulo2' => $this->request->getPost('fecha_pub_articulo2'),
            'articulo3' => $this->request->getPost('articulo3'),
            // 'evidencia_articulo3' => $this->request->getPost('evidencia_articulo3'),
            'fecha_pub_articulo3' => $this->request->getPost('fecha_pub_articulo3'),
            'curso1' => $this->request->getPost('curso1'),
            // 'evidencia_curso1' => $this->request->getPost('evidencia_curso1'),
            'fecha_curso1' => $this->request->getPost('fecha_curso1'),
            'curso2' => $this->request->getPost('curso2'),
            // 'evidencia_curso2' => $this->request->getPost('evidencia_curso2'),
            'fecha_curso2' => $this->request->getPost('fecha_curso2'),
            'curso3' => $this->request->getPost('curso3'),
            // 'evidencia_curso3' => $this->request->getPost('evidencia_curso3'),
            'fecha_curso3' => $this->request->getPost('fecha_curso3'),
            'curso4' => $this->request->getPost('curso4'),
            // 'evidencia_curso4' => $this->request->getPost('evidencia_curso4'),
            'fecha_curso4' => $this->request->getPost('fecha_curso4'),
            'ponencia1' => $this->request->getPost('ponencia1'),
            // 'evidencia_ponencia1' => $this->request->getPost('evidencia_ponencia1'),
            'fecha_ponencia1' => $this->request->getPost('fecha_ponencia1'),
            'ponencia2' => $this->request->getPost('ponencia2'),
            // 'evidencia_ponencia2' => $this->request->getPost('evidencia_ponencia2'),
            'fecha_ponencia2' => $this->request->getPost('fecha_ponencia2'),
            'ponencia3' => $this->request->getPost('ponencia3'),
            // 'evidencia_ponencia3' => $this->request->getPost('evidencia_ponencia3'),
            'fecha_ponencia3' => $this->request->getPost('fecha_ponencia3'),
            'certificacion1' => $this->request->getPost('certificacion1'),
            // 'evidencia_cert1' => $this->request->getPost('evidencia_cert1'),
            'fecha_certificacion1' => $this->request->getPost('fecha_certificacion1'),
            'certificacion2' => $this->request->getPost('certificacion2'),
            // 'evidencia_cert2' => $this->request->getPost('evidencia_cert2'),
            'fecha_certificacion2' => $this->request->getPost('fecha_certificacion2'),
            'certificacion3' => $this->request->getPost('certificacion3'),
            // 'evidencia_cert3' => $this->request->getPost('evidencia_cert3'),
            'fecha_certificacion3' => $this->request->getPost('fecha_certificacion3'),
            'certificacion4' => $this->request->getPost('certificacion4'),
            // 'evidencia_cert4' => $this->request->getPost('evidencia_cert4'),
            'fecha_certificacion4' => $this->request->getPost('fecha_certificacion4'),
            'experiencia_adicional' => $this->request->getPost('experiencia_adicional')
        ];

        // Validar los datos si es necesario

        if ($model->update($this->session->id, $data)) {
            return redirect()->to('docente/expediente')->with('success', 'Expediente actualizado con éxito');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar el expediente');
        }
    }



    






    public function delete($id)
    {
        $this->expedienteModel->delete($id);
        return redirect()->to(site_url('expedientes'))->with('success', 'Expediente eliminado exitosamente');
    }


}
