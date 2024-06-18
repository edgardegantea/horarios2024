<?php

namespace App\Controllers\Docente;

use App\Controllers\BaseController;
use App\Models\AsignaturaModel;
use App\Models\CarreraModel;
use App\Models\PeriodoEscolarModel;
use App\Models\ProgramacionModel;
use App\Models\UsuarioModel;
use TCPDF;

class ProgramacionController extends BaseController
{


    public function index()
    {
        $this->session = \Config\Services::session();
        $docente_id = $this->session->id;

        $docenteModel = new UsuarioModel();
        $docente = $docenteModel->find($docente_id);

        $programacionModel = new ProgramacionModel();
        $asignaciones = $programacionModel->getAsignacionesPorDocente($docente_id);

        $data = [
            'docente' => $docente,
            'asignaciones' => $asignaciones,
        ];

        return view('docente/programacion/index', $data);
    }





    public function generarConstancia($docente_id)
    {
        $this->session = \Config\Services::session();

        $time = new \CodeIgniter\I18n\Time();
        setlocale(LC_TIME, 'es');

        $programacionModel = new ProgramacionModel();
        $asignaciones = $programacionModel->getAsignacionesPorDocente($docente_id);
        $peModel = new PeriodoEscolarModel();


        $periodo = $peModel->where('id', 1)->find();
        $fechaInicioPE = $periodo[0]['fecha_inicio'];
        $fechaInicioP = \DateTime::createFromFormat('Y-m-d', $fechaInicioPE);
        // $fechaInicioPEH = $fechaInicioP->format('d \d\e M \d\e Y');
        $fechaInicioPEH = strftime('%d de %B de %Y', $fechaInicioP->getTimestamp());

        $fechaFinPE = $periodo[0]['fecha_fin'];
        $fechaFinP = \DateTime::createFromFormat('Y-m-d', $fechaFinPE);
        $fechaFinPEH = strftime('%d de %B de %Y', $fechaFinP->getTimestamp());


        $docenteModel = new UsuarioModel();
        $docente = $docenteModel->find($docente_id);

        $carreraModel = new CarreraModel();
        $carrera = $carreraModel->find($asignaciones[0]['carrera_id']);

        $fechaActual = date('Y-m-d');
        $fechaA = \DateTime::createFromFormat('Y-m-d', $fechaActual);
        $fechaActualH = strtoupper(strftime('%d de %B de %Y', $fechaA->getTimestamp()));


        $textoDocenteVisitante = 'En virtud de reunir características académicas y profesionales específicas; se le ha asignado el siguiente curso en la Licenciatura en Pedagogía, que corresponde al período del:';

        $textoDocenteDeBase = 'En virtud de reunir características académicas y Profesionales Específicas y con base en el Reglamento Interior de Trabajo del Personal Docente de la Universidad Pedagógica Nacional, Título Octavo, Distribución de Labores, Jornada de Trabajo, Salario, Licencias y Comisiones, Capítulo I de la Distribución de Labores, Artículos 52 y 53, se le ha asignado el siguiente curso en la Licenciatura en Pedagogía, que corresponde al período del:';

        if ($docente['condicion'] == "DE BASE") {
            $texto = $textoDocenteDeBase;
        } else {
            $texto = $textoDocenteVisitante;
        }


        $pdf = new TCPDF();

        $pdf->setMargins(20, 20, 20, false);
        $pdf->SetFont('', 'B', 10);
        $pdf->AddPage();
        $pdf->setPrintHeader(false);
        // $logoPath = base_url('assets/img/logo/upn212.png');
        // $pdf->Image($logoPath, 10, 10, 30, 30, 'PNG');
        $pdf->Image('assets/img/logo/upnlogotezpdf.jpg', 20, 15, 22, 22, '', '', 'T', false, 300, '', false, false, 0, false, false, false);


        $pdf->Cell(0, 0, 'SECRETARÍA DE EDUCACIÓN PÚBLICA', 0, 0, 'R');
        $pdf->Ln();
        $pdf->Cell(0, 0, 'UNIVERSIDAD PEDAGÓGICA NACIONAL', 0, 0, 'R');
        $pdf->Ln();
        $pdf->Cell(0, 0, 'UNIDAD 212 TEZIUTLÁN', 0, 0, 'R');

        $pdf->Ln(10);

        $pdf->Cell(0, 0, 'ASUNTO: ASIGNACIÓN DE CARGA ACADÉMICA', 0, 0, 'R');
        $pdf->Ln();
        $pdf->Cell(0, 0, 'TEZIUTLÁN, PUE. A ' . $fechaActualH . '.', 0, 0, 'R');

        $pdf->Ln(10);


        $pdf->Cell(0, 10, strtoupper('C. ' . $docente['nombre'] . ' ' . $docente['apaterno'] . ' ' . $docente['amaterno']));
        $pdf->Ln(4);
        $pdf->Cell(0, 10, strtoupper('DOCENTE ' . $docente['condicion'] . ' DE LA UPN-212'));
        $pdf->Ln(4);
        $pdf->Cell(0, 10, 'P R E S E N T E');

        $pdf->Ln(15);
        // $constanciaTexto = 'En virtud de reunir características académicas y Profesionales Específicas y con base en el reglamento interior de Trabajo del Personal Docente de la Universidad Pedagógica Nacional, Título Octavo, Distribución de Labores, Jornada de Trabajo, Salario, Licencias y Comisiones, Capítulo I de la de Distribución de Labores, Artículos 52 y 53, se le ha asignado el(los) siguiente(s) curso(s) en la ' . $carrera['nombre'] . ' que corresponde al periodo del ' . $fechaInicioPEH . ' al ' . $fechaFinPEH . '.
        // ';


        $constanciaTexto = $texto;

        $pdf->SetFont('', '', 10);
        $pdf->MultiCell(0, 0, $constanciaTexto, 0, 'J', false, 1, null, null, true);


        $html = '<table border="1" width="100%">
        <tr style="text-align:center; vertical-align: middle; background-color: #dddddd;">
            <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="10%">CM</th>
            <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="50%">ASIGNATURA</th>
            <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="25%">HORARIO Y DÍA</th>
            <th style="vertical-align: middle; text-align: center; font-weight: bold" height="25" width="*">SEM</th>
        </tr>';

        $asignaturaModel = new AsignaturaModel();
        $claveAsignatura = $asignaturaModel->select('asignaturas.clave as cm')->join('programacion', 'asignaturas.id = programacion.materia_id', 'left')->findAll();


        $db = \Config\Database::connect();
        $todo = $db->query('select p.*, p.docente_id as pd, ac.id as ida, a.id as aid, a.nombre as nombremateria, a.clave as cm from programacion as p left join asignaturas_carreras as ac on ac.id = p.materia_id left join asignaturas as a on p.materia_id = a.id where p.docente_id =' . $this->session->id)->getResultArray();



        /*
        foreach ($asignaciones as $asignacion) {
            foreach ($claveAsignatura as $ca) {


                $horaInicio1 = date('H:i', strtotime($asignacion['hora_inicio1']));
                $horaInicio2 = date('H:i', strtotime($asignacion['hora_inicio2']));
                $horaFin1 = date('H:i', strtotime($asignacion['hora_fin1']));
                $horaFin2 = date('H:i', strtotime($asignacion['hora_fin2']));

                // $asignaturaModel = new AsignaturaModel();
                // $asignatura = $asignaturaModel->find($asignacion['asignatura']);
                // $claveAsignatura = isset($asignatura['asignatura']) ? $asignatura['clave'] : '';
                // $claveAsignatura = $asignaturaModel->select('asignaturas.clave as cm')->join('programacion', 'programacion.materia_id = asignaturas.id', 'outer')->findAll();
        */

        foreach ($todo as $asignacion) {
            $horaInicio1 = date('H:i', strtotime($asignacion['hora_inicio1']));
            $horaInicio2 = date('H:i', strtotime($asignacion['hora_inicio2']));
            $horaFin1 = date('H:i', strtotime($asignacion['hora_fin1']));
            $horaFin2 = date('H:i', strtotime($asignacion['hora_fin2']));



                $pdf->setFont('', '', 8);
                $html .= '<tr>' .

                    '<td>' . $asignacion['cm'] . '</td>
                
                    <td>' . $asignacion['nombremateria'] . '</td>
                    <td>' .
                    $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '<br>' .
                    $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 .
                    '</td>
                    <td style="text-align:center">' . $asignacion['grupo'] .
                    '</td>
                    </tr>';
            }

            $html .= '</table>';

            $pdf->writeHTML($html, true, false, false);

            $pdf->Ln();


            $constanciaTexto2 = 'Deseándole el mayor de los éxitos en el desempeño de esta tarea, aprovecho la oportunidad para invitarle a que, en el ejercicio de sus funciones, ponga lo mejor de su esfuerzo y dedicación al servicio de la Universidad Pedagógica Nacional; siguiendo las indicaciones institucionales, estableciendo comunicación permanente con su coordinador (a) y apoyando en las diversas actividades que fortalezcan la formación de nuestros alumnos, así como la vida institucional de nuestra universidad.
        ';
            $pdf->SetFont('', '', 10);
            $pdf->MultiCell(0, 10, $constanciaTexto2, 0, 'J', 0);
            $pdf->Ln(10, false);

            $pdf->Cell(0, 10, 'A T E N T A M E N T E', 0, 0, 'C');
            $pdf->Ln(5);
            $pdf->Cell(0, 10, '"EDUCAR PARA TRANSFORMAR"', 0, 0, 'C');

            $pdf->Ln(35);

            $firmante = "LIC. YUNERI CALIXTO PÉREZ\nENCARGADA DEL DESPACHO DE LA DIRECCIÓN\nDE LA UNIVERSIDAD PEDAGÓGICA NACIONAL\nUNIDAD 212 TEZIUTLÁN";
            $pdf->MultiCell(0, 0, $firmante, 0, 'C');
            // $pdf->Cell(0, 10, $firmante, 0, 0, 'C');


            $pdf->Output('constancia.pdf', 'I');
            exit();
        }

}