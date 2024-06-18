<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CarreraModel;
use App\Models\DocenteModel;
use App\Models\PeriodoEscolarModel;
use App\Models\ProgramacionModel;
use App\Models\UsuarioModel;
use App\Models\DocentesCarrerasModel;
use App\Models\CarrerasAsignaturasModel;
use App\Models\AsignaturaModel;
use CodeIgniter\I18n\Time;
use function Composer\Pcre\Regex;

class ProgramacionController extends BaseController
{

    public function agregar_horario($carrera_id)
    {
        $docenteModel = new DocenteModel();
        $asignaturaModel = new AsignaturaModel();

        $data['docentes'] = $docenteModel->getCarreras($carrera_id);
        $data['asignaturas'] = $asignaturaModel->getCarreras($carrera_id);
        $data['carrera_id'] = $carrera_id;

        return view('carrera_docente/agregar_horario', $data);
    }


    public function eliminarAsignacion()
    {
        $asignacionId = $this->request->getPost('asignacion_id');

        $asignacionModel = new ProgramacionModel();
        $asignacion = $asignacionModel->find($asignacionId);

        if (!$asignacion) {
            return redirect()->back()->with('error', 'La asignación de horario no existe.');
        }

        $asignacionModel->delete($asignacionId);

        return redirect()->to("/admin/carreras/asignaciones/{$asignacion['carrera_id']}")->with('success', 'Asignación de horario eliminada exitosamente.');
    }


    public function eliminarAsignacionHorario()
    {
        $asignacionId = $this->request->getPost('asignacion_id');
        $asignacionHorarioModel = new ProgramacionModel();
        $asignacionHorarioModel->delete($asignacionId);


        return redirect()->to("/admin/carreras/asignaciones/")->with('success', 'Asignación de horario eliminada exitosamente.');
    }


    public function editarAsignacionX($id)
    {
        $docenteModel = new UsuarioModel();
        $asignaturaModel = new AsignaturaModel();
        $programacionModel = new ProgramacionModel();

        $data['docentes'] = $docenteModel->getCarreras($id);
        $data['asignaturas'] = $asignaturaModel->getCarreras($id);
        $data['carrera_id'] = $id;
        $data['asignacion_id'] = $programacionModel->find($id);


        return view('admin/carreras/editar_asignacion', $data);
    }


    public function printAll()
    {
        $time = new \CodeIgniter\I18n\Time();
        setlocale(LC_TIME, 'es');

        $this->session = \Config\Services::session();
        $docenteModel = new UsuarioModel();
        $docentes = $docenteModel->where('rol', 'docente')->findAll();


        $asignaturaModel = new AsignaturaModel();
        $claveAsignatura = $asignaturaModel->select('asignaturas.clave as cm')->join('programacion', 'asignaturas.id = programacion.materia_id', 'left')->findAll();

        $peModel = new PeriodoEscolarModel();
        $periodo = $peModel->where('id', 1)->find();
        $fechaInicioPE = $periodo[0]['fecha_inicio'];
        $fechaInicioP = \DateTime::createFromFormat('Y-m-d', $fechaInicioPE);
        // $fechaInicioPEH = $fechaInicioP->format('d \d\e M \d\e Y');
        $fechaInicioPEH = strftime('%d de %B de %Y', $fechaInicioP->getTimestamp());

        $fechaFinPE = $periodo[0]['fecha_fin'];
        $fechaFinP = \DateTime::createFromFormat('Y-m-d', $fechaFinPE);
        $fechaFinPEH = strftime('%d de %B de %Y', $fechaFinP->getTimestamp());


        $fechaA = Time::now('America/Mexico_City', 'es_ES');
        // $fechaActual = date('Y-m-d');
        // $fechaA = \DateTime::createFromFormat('Y-m-d', $fechaActual);
        $fechaActualH = strtoupper(strftime('%d de %B de %Y', $fechaA->getTimestamp()));


        $pdf = new \TCPDF();

        $pdf->setMargins(20, 20, 20, false);
        $pdf->SetFont('', 'B', 10);


        foreach ($docentes as $docente) {


            $asignaciones = $this->getAsignacionesDocente($docente['id']);

            foreach ($asignaciones as $a) {
                if ($a['carrera_id'] == 1) {
                    $carreraN = 'LICENCIATURA EN ADMINISTRACIÓN EDUCATIVA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 3) {
                    $carreraN = 'LICENCIATURA EN PSICOLOGÍA EDUCATIVA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 5) {
                    $carreraN = 'LICENCIATURA EN INTERVENCIÓN EDUCATIVA B-LEARNING';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 6) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN E INNOVACIÓN PEDAGOGÍCA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 7) {
                    $carreraN = 'MAESTRÍA EN EDUCACIÓN BÁSICA';
                    $periodo = 'del 18 de noviembre de 2023 al 18 de febrero de 2024';
                } elseif ($a['carrera_id'] == 8) {
                    $carreraN = 'MAESTRÍA EN EDUCACIÓN MEDIA SUPERIOR';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 9) {
                    $carreraN = 'MAESTRÍA EN DIDÁCTICA DE LENGUAS Y CULTURAS INDOAMERICANAS';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 10) {
                    $carreraN = 'LICENCIATURA EN PEDAGOGÍA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 11) {
                    $carreraN = 'LICENCIATURA EN INTERVENCIÓN EDUCATIVA ESCOLARIZADA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 12) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE AYOTOXCO)';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 13) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE HUEYAPAN)';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 14) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE ZAPOTITLÁN)';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 15) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE GUADALUPE VICTORIA)';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } else {
                    $carreraN = 'CURSO SEPA INGLES ';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                }
            }


            $textoDocenteVisitante = 'En virtud de reunir características académicas y profesionales específicas; se le ha asignado el siguiente curso en ' . $carreraN . ', que corresponde al periodo ' . $periodo . '.
        ';

            $textoDocenteDeBase = 'En virtud de reunir características académicas y Profesionales Específicas y con base en el Reglamento Interior de Trabajo del Personal Docente de la Universidad Pedagógica Nacional, Título Octavo, Distribución de Labores, Jornada de Trabajo, Salario, Licencias y Comisiones, Capítulo I de la Distribución de Labores, Artículos 52 y 53, se le ha asignado el siguiente curso en la ' . $carreraN . ', que corresponde al periodo ' . $periodo . '.
        ';

            if ($docente['condicion'] == "DE BASE") {
                $texto = $textoDocenteDeBase;
            } else {
                $texto = $textoDocenteVisitante;
            }


            $pdf->AddPage();
            $pdf->setPrintHeader(false);
            // $logoPath = base_url('assets/img/logo/upn212.png');
            // $pdf->Image($logoPath, 10, 10, 30, 30, 'PNG');
            $pdf->Image('assets/img/logo/logoconstancia.jpg', 20, 60, 60, 100, '', '', 'T', false, 300, '', false, false, 0, false, false, false);


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


            foreach ($asignaciones as $asignacion) {
                $horaInicio1 = date('H:i', strtotime($asignacion['hora_inicio1']));
                $horaInicio2 = date('H:i', strtotime($asignacion['hora_inicio2']));
                $horaInicio3 = date('H:i', strtotime($asignacion['hora_inicio3']));
                $horaInicio4 = date('H:i', strtotime($asignacion['hora_inicio4']));
                $horaInicio5 = date('H:i', strtotime($asignacion['hora_inicio5']));
                $horaInicio6 = date('H:i', strtotime($asignacion['hora_inicio6']));

                $horaFin1 = date('H:i', strtotime($asignacion['hora_fin1']));
                $horaFin2 = date('H:i', strtotime($asignacion['hora_fin2']));
                $horaFin3 = date('H:i', strtotime($asignacion['hora_fin3']));
                $horaFin4 = date('H:i', strtotime($asignacion['hora_fin4']));
                $horaFin5 = date('H:i', strtotime($asignacion['hora_fin5']));
                $horaFin6 = date('H:i', strtotime($asignacion['hora_fin6']));


                $pdf->setFont('', '', 8);
                $html .= '<tr>' .

                    '<td>' . $asignacion['claveAsignatura'] . '</td>
                    <td>' . $asignacion['nombreAsignatura'] . '</td>';
                $html .= '<td>';

                if (!empty($asignacion['fecha_inicio_modular']) && ($asignacion['fecha_inicio_modular'] != '0000-00-00')) {
                    $html .= 'Del ' . $asignacion['fecha_inicio_modular'] . ' al ' . $asignacion['fecha_fin_modular'];
                }

                if ($asignacion['hora_inicio1'] != '00:00:00') {
                    $html .= $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '<br>';
                }
                if ($asignacion['hora_inicio2'] != '00:00:00') {
                    $html .= $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>';
                }
                if ($asignacion['hora_inicio3'] != '00:00:00') {
                    $html .= $asignacion['dia_semana3'] . ' De ' . $horaInicio3 . ' a ' . $horaFin3 . '<br>';
                }
                if ($asignacion['hora_inicio4'] != '00:00:00') {
                    $html .= $asignacion['dia_semana4'] . ' De ' . $horaInicio4 . ' a ' . $horaFin4 . '<br>';
                }
                if ($asignacion['hora_inicio5'] != '00:00:00') {
                    $html .= $asignacion['dia_semana5'] . ' De ' . $horaInicio5 . ' a ' . $horaFin5 . '<br>';
                }
                if ($asignacion['hora_inicio6'] != '00:00:00') {
                    $html .= $asignacion['dia_semana6'] . ' De ' . $horaInicio6 . ' a ' . $horaFin6;
                }

                /*
                if($asignacion['hora_inicio2'] != '00:00:00') {
                    $html .= $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '<br>';
                    $html .= $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>';
                    $html .= $asignacion['dia_semana3'] . ' De ' . $horaInicio3 . ' a ' . $horaFin3 . '<br>';
                    $html .= $asignacion['dia_semana4'] . ' De ' . $horaInicio4 . ' a ' . $horaFin4 . '<br>';
                    $html .= $asignacion['dia_semana5'] . ' De ' . $horaInicio5 . ' a ' . $horaFin5 . '<br>';
                    $html .= $asignacion['dia_semana6'] . ' De ' . $horaInicio6 . ' a ' . $horaFin6 . '<br>';
            }
            */


                // $html .= $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2;

                $html .= '</td>
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


        }

        $pdf->Output('constancia.pdf', 'I');
        exit();
    }




    /*
        public function printAll()
        {
            $time = new \CodeIgniter\I18n\Time();
            setlocale(LC_TIME, 'es');

            $this->session = \Config\Services::session();
            $docenteModel = new UsuarioModel();
            $docentes = $docenteModel->where('rol', 'docente')->findAll();


            $asignaturaModel = new AsignaturaModel();
            $claveAsignatura = $asignaturaModel->select('asignaturas.clave as cm')->join('programacion', 'asignaturas.id = programacion.materia_id', 'left')->findAll();

            $peModel = new PeriodoEscolarModel();
            $periodo = $peModel->where('id', 1)->find();
            $fechaInicioPE = $periodo[0]['fecha_inicio'];
            $fechaInicioP = \DateTime::createFromFormat('Y-m-d', $fechaInicioPE);
            $fechaInicioPEH = strftime('%d de %B de %Y', $fechaInicioP->getTimestamp());

            $fechaFinPE = $periodo[0]['fecha_fin'];
            $fechaFinP = \DateTime::createFromFormat('Y-m-d', $fechaFinPE);
            $fechaFinPEH = strftime('%d de %B de %Y', $fechaFinP->getTimestamp());

            $fechaA = Time::now('America/Mexico_City', 'es_ES');
            // $fechaActual = date('Y-m-d');
            // $fechaA = \DateTime::createFromFormat('Y-m-d', $fechaActual);
            $fechaActualH = strtoupper(strftime('%d de %B de %Y', $fechaA->getTimestamp()));

            $textoDocenteVisitante = 'En virtud de reunir características académicas y profesionales específicas; se le ha asignado el siguiente curso en la Licenciatura en Pedagogía, que corresponde al período del
            ';

            $textoDocenteDeBase = 'En virtud de reunir características académicas y Profesionales Específicas y con base en el Reglamento Interior de Trabajo del Personal Docente de la Universidad Pedagógica Nacional, Título Octavo, Distribución de Labores, Jornada de Trabajo, Salario, Licencias y Comisiones, Capítulo I de la Distribución de Labores, Artículos 52 y 53, se le ha asignado el siguiente curso en la Licenciatura en Pedagogía, que corresponde al período del
            ';


            $pdf = new \TCPDF();

            $pdf->setMargins(20, 20, 20, false);
            $pdf->SetFont('', 'B', 10);


            foreach ($docentes as $docente) {

                if ($docente['condicion'] == "DE BASE") {
                    $texto = $textoDocenteDeBase;
                } else {
                    $texto = $textoDocenteVisitante;
                }


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

                $constanciaTexto = $texto;

                $pdf->SetFont('', '', 10);
                $pdf->MultiCell(0, 0, $constanciaTexto, 0, 'J', false, 1, null, null, true);

                $asignaciones = $this->getAsignacionesDocente($docente['id']);


                foreach ($asignaciones as $asignacion) {
                    $diasConHoras = array_filter($asignacion, function($hora_inicio1) {
                        return $hora_inicio1 !== '00:00:00';
                    });

                    // Verificar si hay días con horas asignadas
                    if (!empty($diasConHoras)) {
                        // Agregar información de la asignación al PDF
                        $pdf->SetFont('', '', 12);
                        $pdf->Cell(0, 10, 'Asignatura: ' . $asignacion['nombreAsignatura'], 0, 1);

                        // Agregar detalles de los días con horas asignadas
                        foreach ($diasConHoras as $dia_semana1 => $hora_inicio1) {
                            $pdf->Cell(0, 10, 'Día: ' . $dia_semana1 . ' - Hora: ' . $hora_inicio1, 0, 1);
                        }

                        $pdf->Ln();
                    }
                }
    */

    /*
                $html = '<table border="1" width="100%">
                            <tr style="text-align:center; vertical-align: middle; background-color: #dddddd;">
                                <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="10%">CM</th>
                                <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="50%">ASIGNATURA</th>
                                <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="25%">HORARIO Y DÍA</th>
                                <th style="vertical-align: middle; text-align: center; font-weight: bold" height="25" width="*">SEM</th>
                            </tr>';

                foreach ($asignaciones as $asignacion) {
                    $horaInicio1 = date('H:i', strtotime($asignacion['hora_inicio1']));
                    $horaInicio2 = date('H:i', strtotime($asignacion['hora_inicio2']));
                    $horaInicio3 = date('H:i', strtotime($asignacion['hora_inicio3']));
                    $horaInicio4 = date('H:i', strtotime($asignacion['hora_inicio4']));
                    $horaInicio5 = date('H:i', strtotime($asignacion['hora_inicio5']));
                    $horaInicio6 = date('H:i', strtotime($asignacion['hora_inicio6']));

                    $horaFin1 = date('H:i', strtotime($asignacion['hora_fin1']));
                    $horaFin2 = date('H:i', strtotime($asignacion['hora_fin2']));
                    $horaFin3 = date('H:i', strtotime($asignacion['hora_fin3']));
                    $horaFin4 = date('H:i', strtotime($asignacion['hora_fin4']));
                    $horaFin5 = date('H:i', strtotime($asignacion['hora_fin5']));
                    $horaFin6 = date('H:i', strtotime($asignacion['hora_fin6']));
    */

    /*
                    if ($horaInicio1 != '00:00:00' && $horaFin1 != '00:00:00') {
                        $resultado =
                              $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '<br>
                            </td><td style="text-align:center">' . $asignacion['grupo'];
                    } else if ($horaInicio2 != '00:00:00' && $horaFin2 != '00:00:00') {
                        $resultado =
                              $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '<br>'
                            . $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>'
                            . $asignacion['dia_semana3'] . ' De ' . $horaInicio3 . ' a ' . $horaFin3 . '<br>'
                            . $asignacion['dia_semana4'] . ' De ' . $horaInicio4 . ' a ' . $horaFin4 . '<br>'
                            . $asignacion['dia_semana5'] . ' De ' . $horaInicio5 . ' a ' . $horaFin5 . '<br>'
                            . $asignacion['dia_semana6'] . ' De ' . $horaInicio6 . ' a ' . $horaFin6 . '<br>
                            </td><td style="text-align:center">' . $asignacion['grupo'];
                    } else if ($horaInicio3 != '00:00:00' && $horaFin3 != '00:00:00') {
                        $resultado =
                              $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '<br>'
                            . $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>'
                            . $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>'
                            . $asignacion['dia_semana3'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>'
                            . $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>'
                            . $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>'
                            . $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 .'
                            </td><td style="text-align:center">' . $asignacion['grupo'];
                    }
                    */
    /*
                    $pdf->setFont('', '', 8);

                    $html .= '<tbody><tr><td>' . $asignacion['claveAsignatura'] . '</td>
                        <td>' . $asignacion['nombreAsignatura'] . '</td><td>';
                            ($horaInicio1 != '00:00:00') ? $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '<br>';
                        }
                        $html .= '</td><td style="text-align: center">' . $asignacion['grupo'] . '</td><tr></tbody>';
                        $html .= '</table>';
    }

                $pdf->writeHTML($html, true, false, false);

    */
    /*

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
            }

            $pdf->Output('constancia.pdf', 'I');
            exit();
        }
        */


    private function getAsignacionesDocente($docenteId)
    {
        $programacionModel = new ProgramacionModel();
        return $programacionModel->select('concat(u.nombre, " ", u.apaterno, " ", u.amaterno) as docente, a.clave as claveAsignatura, a.nombre as nombreAsignatura, programacion.*')
            ->join('usuarios as u', 'programacion.docente_id = u.id')
            ->join('asignaturas as a', 'programacion.materia_id = a.id')
            ->where('docente_id', $docenteId)->findAll();
    }


    private function getAsignacionesDocente2($docenteId)
    {
        $programacionModel = new ProgramacionModel();
        return $programacionModel->select('concat(u.nombre, " ", u.apaterno, " ", u.amaterno) as docente, a.clave as claveAsignatura, a.nombre as nombreAsignatura, programacion.*, c.nombre as carreraN')
            ->join('usuarios as u', 'programacion.docente_id = u.id')
            ->join('asignaturas as a', 'programacion.materia_id = a.id')
            ->join('carreras as c', 'programacion.carrera_id = c.id')
            ->where('docente_id', $docenteId)->findAll();
    }


    private function formatHorario($asignacion)
    {

        $horario = '';
        for ($i = 1; $i <= 6; $i++) {
            $horaInicio = $asignacion["hora_inicio$i"];
            $horaFin = $asignacion["hora_fin$i"];
            $diaSemana = $asignacion["dia_semana$i"];


            if (!empty($horaInicio) && !empty($horaFin)) {
                $horario .= "Día $diaSemana: $horaInicio - $horaFin, ";
            }
        }

        return rtrim($horario, ', ');
    }






    ///////////////////////////////////////////////////////////
    /// FUNCIÓN PARA GENERAR PDF DE CONSTANCIAS POR CARRERA ///
    ///////////////////////////////////////////////////////////

    public function exportarPDF($carrera_id)
    {
        $time = new \CodeIgniter\I18n\Time();
        setlocale(LC_TIME, 'es_ES.UTF-8');

        $this->programacionModel = new ProgramacionModel();
        $docentes = $this->programacionModel->getDocentesByCarrera($carrera_id);

        $this->carreraModel = new CarreraModel();
        $carreraName = $this->carreraModel->getCarreraName($carrera_id);

        $fechaA = Time::now('America/Mexico_City', 'es_ES');
        $fechaActualH = strtoupper(strftime('%d de %B de %Y', $fechaA->getTimestamp()));

        $pdf = new \TCPDF();
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetFont('', 'B', 8);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);




            // $assignments = $this->programacionModel->getAssignmentsByDocenteAndCarrera($docente['docente_id'], $carrera_id);

foreach ($docentes as $docente) {
$assignments = $this->programacionModel->getAssignmentsByDocenteAndCarrera($docente['docente_id'], $carrera_id);



            foreach ($assignments as $a) {
                if ($a['carrera_id'] == 1) {
                    $carreraN = 'LICENCIATURA EN ADMINISTRACIÓN EDUCATIVA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 3) {
                    $carreraN = 'LICENCIATURA EN PSICOLOGÍA EDUCATIVA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 5) {
                    $carreraN = 'LICENCIATURA EN INTERVENCIÓN EDUCATIVA B-LEARNING';
                    $periodo = 'del 13 de enero al 01 de junio de 2024';
                } elseif ($a['carrera_id'] == 6) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN E INNOVACIÓN PEDAGOGÍCA';
                    $periodo = 'del 13 de enero al 16 de marzo de 2024';
                } elseif ($a['carrera_id'] == 7) {
                    $carreraN = 'MAESTRÍA EN EDUCACIÓN BÁSICA';
                    $periodo = 'del 18 de noviembre de 2023 al 18 de febrero de 2024';
                } elseif ($a['carrera_id'] == 8) {
                    $carreraN = 'MAESTRÍA EN EDUCACIÓN MEDIA SUPERIOR';
                    $periodo = 'del 02 de febrero al 02 de abril de 2024';
                } elseif ($a['carrera_id'] == 9) {
                    $carreraN = 'MAESTRÍA EN DIDÁCTICA DE LENGUAS Y CULTURAS INDOAMERICANAS';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 10) {
                    $carreraN = 'LICENCIATURA EN PEDAGOGÍA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 11) {
                    $carreraN = 'LICENCIATURA EN INTERVENCIÓN EDUCATIVA ESCOLARIZADA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 12) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE AYOTOXCO)';
                    $periodo = 'del 03 de febrero al 08 de junio de 2024';
                } elseif ($a['carrera_id'] == 13) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE HUEYAPAN)';
                    $periodo = 'del 03 de febrero al 08 de junio de 2024';
                } elseif ($a['carrera_id'] == 14) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE ZAPOTITLÁN)';
                    $periodo = 'del 03 de febrero al 08 de junio de 2024';
                } elseif ($a['carrera_id'] == 15) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE GUADALUPE VICTORIA)';
                    $periodo = 'del 03 de febrero al 08 de junio de 2024';
                } else {
                    $carreraN = 'CURSO SEPA INGLES ';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                }
            }


            $textoDocenteVisitante = 'En virtud de reunir características académicas y profesionales específicas; se le ha asignado el siguiente curso en ' . $carreraName . ', que corresponde al periodo ' . $periodo . '.
        ';

            $textoDocenteDeBase = 'En virtud de reunir características académicas y Profesionales Específicas y con base en el Reglamento Interior de Trabajo del Personal Docente de la Universidad Pedagógica Nacional, Título Octavo, Distribución de Labores, Jornada de Trabajo, Salario, Licencias y Comisiones, Capítulo I de la Distribución de Labores, Artículos 52 y 53, se le ha asignado el siguiente curso en la ' . $carreraName . ', que corresponde al periodo ' . $periodo . '.
        ';


            if ($docente['condicion'] == "DE BASE") {
                $texto = $textoDocenteDeBase;
                $condicion = 'DE BASE';
            }
            else if($docente['condicion'] == "INTERINO LIMITANTE") {
                $texto = $textoDocenteVisitante;
                $condicion = 'INTERINO LIMITANTE';
            }else {
                $texto = $textoDocenteVisitante;
                $condicion = 'VISITANTE';
            }

            $search = array('á', 'é', 'í', 'ó', 'ú', 'ü');
            $replace = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ü');
            $nombreDD = strtoupper($docente['nombre'] . ' ' . $docente['apaterno'] . ' ' . $docente['amaterno']);
            $nombreDelDocente = str_replace($search, $replace, $nombreDD);

            $pdf->AddPage();
            $pdf->setPrintHeader(false);
            $pdf->Image('assets/img/logo/logoconstancia.jpg', 20, 15, 50, 20, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

            $pdf->Ln(5);

            $pdf->setFont('', '', 8);
            $pdf->Cell(0, 0, 'SECRETARÍA DE EDUCACIÓN', 0, 0, 'R');
            $pdf->Ln();
            $pdf->Cell(0, 0, 'UNIVERSIDAD PEDAGÓGICA NACIONAL', 0, 0, 'R');
            $pdf->Ln();
            $pdf->Cell(0, 0, 'UNIDAD 212 TEZIUTLÁN', 0, 0, 'R');

            $pdf->Ln(15);

            $pdf->Cell(0, 0, 'ASUNTO: ASIGNACIÓN DE CARGA ACADÉMICA', 0, 0, 'R');
            $pdf->Ln();
            $pdf->Cell(0, 0, 'TEZIUTLÁN, PUE. A ' . $fechaActualH . '.', 0, 0, 'R');

            $pdf->Ln(10);


            $pdf->Cell(0, 10, $nombreDelDocente);
            $pdf->Ln(4);
            // $pdf->Cell(0, 10, strtoupper('DOCENTE ' . $docente['condicion'] . ' DE LA UPN-212'));
            $pdf->Cell(0, 10, strtoupper('DOCENTE ' . $condicion . ' DE LA UPN-212'));
            $pdf->Ln(4);
            $pdf->Cell(0, 10, 'P R E S E N T E');

            $pdf->Ln(15);

            $constanciaTexto = $texto;

            $pdf->SetFont('', '', 8);
            $pdf->MultiCell(0, 0, $constanciaTexto, 0, 'J', false, 1, null, null, true);

            $html = '<table border="1" width="100%">
        <tr style="text-align:center; vertical-align: middle; background-color: #dddddd;">
            <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="10%">CM</th>
            <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="50%">ASIGNATURA</th>
            <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="25%">HORARIO Y DÍA</th>
            <th style="vertical-align: middle; text-align: center; font-weight: bold" height="25" width="*">SEM</th>
        </tr>';

            foreach ($assignments as $asignacion) {

                $horaInicio1 = date('H:i', strtotime($asignacion['hora_inicio1']));
                $horaInicio2 = date('H:i', strtotime($asignacion['hora_inicio2']));
                $horaInicio3 = date('H:i', strtotime($asignacion['hora_inicio3']));
                $horaInicio4 = date('H:i', strtotime($asignacion['hora_inicio4']));
                $horaInicio5 = date('H:i', strtotime($asignacion['hora_inicio5']));
                $horaInicio6 = date('H:i', strtotime($asignacion['hora_inicio6']));

                $horaFin1 = date('H:i', strtotime($asignacion['hora_fin1']));
                $horaFin2 = date('H:i', strtotime($asignacion['hora_fin2']));
                $horaFin3 = date('H:i', strtotime($asignacion['hora_fin3']));
                $horaFin4 = date('H:i', strtotime($asignacion['hora_fin4']));
                $horaFin5 = date('H:i', strtotime($asignacion['hora_fin5']));
                $horaFin6 = date('H:i', strtotime($asignacion['hora_fin6']));


                $pdf->setFont('', '', 8);
                $html .= '<tr><td>' . $asignacion['claveAsignatura'] . '</td>
                    <td>';


                $html .= $asignacion['nombreAsignatura'];

                $html .= '</td><td><ul style"list-style-type: none;
      margin: 0;
      padding: 0;">';

                if (!empty($asignacion['fecha_inicio_modular']) && ($asignacion['fecha_inicio_modular'] != '0000-00-00')) {
                    $html .= 'Del ' . $asignacion['fecha_inicio_modular'] . ' al ' . $asignacion['fecha_fin_modular'];
                }

                if ($asignacion['hora_inicio1'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '</li>';
            }
            if ($asignacion['hora_inicio2'] != '00:00:00') {
                $html .= '<li>' .$asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '</li>';
            }
            if ($asignacion['hora_inicio3'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana3'] . ' De ' . $horaInicio3 . ' a ' . $horaFin3 . '</li>';
            }
            if ($asignacion['hora_inicio4'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana4'] . ' De ' . $horaInicio4 . ' a ' . $horaFin4 . '</li>';
            }
            if ($asignacion['hora_inicio5'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana5'] . ' De ' . $horaInicio5 . ' a ' . $horaFin5 . '</li>';
            }
            if ($asignacion['hora_inicio6'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana6'] . ' De ' . $horaInicio6 . ' a ' . $horaFin6 . '</li>';
            }

                    $html .= '</ul></td>
                    <td style="text-align:center">' . $asignacion['grupo'] .
                    '</td>
                    </tr>';
            }


            $html .= '</table>';

            $pdf->writeHTML($html, true, false, false);

            $pdf->Ln();


            $constanciaTexto2 = 'Deseándole el mayor de los éxitos en el desempeño de esta tarea, aprovecho la oportunidad para invitarle a que, en el ejercicio de sus funciones, ponga lo mejor de su esfuerzo y dedicación al servicio de la Universidad Pedagógica Nacional; siguiendo las indicaciones institucionales, estableciendo comunicación permanente con su coordinador (a) y apoyando en las diversas actividades que fortalezcan la formación de nuestros alumnos, así como la vida institucional de nuestra universidad.
        ';
            $pdf->SetFont('', '', 8);
            $pdf->MultiCell(0, 10, $constanciaTexto2, 0, 'J', 0);
            $pdf->Ln(10, false);

            $pdf->Cell(0, 10, 'A T E N T A M E N T E', 0, 0, 'C');
            $pdf->Ln(5);
            $pdf->Cell(0, 10, '"EDUCAR PARA TRANSFORMAR"', 0, 0, 'C');

            $pdf->Ln(35);

            $firmante = "LIC. YUNERI CALIXTO PÉREZ\nENCARGADA DEL DESPACHO DE LA DIRECCIÓN\nDE LA UNIVERSIDAD PEDAGÓGICA NACIONAL\nUNIDAD 212 TEZIUTLÁN";
            $pdf->MultiCell(0, 0, $firmante, 0, 'C');

            $pdf->SetY(245);

            $pdf->Image('assets/img/pieconstancia.jpg', 5, $pdf->getY(), 200, 0, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        }


        $pdf->Output('Constancias-'.$carreraName.'.pdf', 'I');
        exit();
    }

    public function footerCallback($pdf)
    {
        // Set position for the image
        $pdf->SetY(-15);

        // Add your image to the footer
        $imagePath = FCPATH . '/assets/img/pieconstancia.jpg'; // Adjust the path
        $pdf->Image($imagePath, 10, $pdf->GetY(), 30, 10); // Adjust the coordinates and size

        // Set the position for the text next to the image
        $pdf->SetXY(45, $pdf->GetY());
        $pdf->Cell(0, 10, 'Your text here', 0, 0, 'L');
    }



    public function addAssignmentsToPDF($pdf, $assignments)
    {
        foreach ($assignments as $asignacion) {
            $horaInicio1 = date('H:i', strtotime($asignacion['hora_inicio1']));
            $horaInicio2 = date('H:i', strtotime($asignacion['hora_inicio2']));
            $horaInicio3 = date('H:i', strtotime($asignacion['hora_inicio3']));
            $horaInicio4 = date('H:i', strtotime($asignacion['hora_inicio4']));
            $horaInicio5 = date('H:i', strtotime($asignacion['hora_inicio5']));
            $horaInicio6 = date('H:i', strtotime($asignacion['hora_inicio6']));

            $horaFin1 = date('H:i', strtotime($asignacion['hora_fin1']));
            $horaFin2 = date('H:i', strtotime($asignacion['hora_fin2']));
            $horaFin3 = date('H:i', strtotime($asignacion['hora_fin3']));
            $horaFin4 = date('H:i', strtotime($asignacion['hora_fin4']));
            $horaFin5 = date('H:i', strtotime($asignacion['hora_fin5']));
            $horaFin6 = date('H:i', strtotime($asignacion['hora_fin6']));


            $pdf->setFont('', '', 8);
            $html .= '<tr>' .

                '<td>' . $asignacion['claveAsignatura'] . '</td>
                    <td>' . $asignacion['nombreAsignatura'] . '</td>';
            $html .= '<td><ul>';

            if (!empty($asignacion['fecha_inicio_modular']) && ($asignacion['fecha_inicio_modular'] != '0000-00-00')) {
                $html .= 'Del ' . $asignacion['fecha_inicio_modular'] . ' al ' . $asignacion['fecha_fin_modular'];
            }

            if ($asignacion['hora_inicio1'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '</li>';
            }
            if ($asignacion['hora_inicio2'] != '00:00:00') {
                $html .= '<li>' .$asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '</li>';
            }
            if ($asignacion['hora_inicio3'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana3'] . ' De ' . $horaInicio3 . ' a ' . $horaFin3 . '</li>';
            }
            if ($asignacion['hora_inicio4'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana4'] . ' De ' . $horaInicio4 . ' a ' . $horaFin4 . '</li>';
            }
            if ($asignacion['hora_inicio5'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana5'] . ' De ' . $horaInicio5 . ' a ' . $horaFin5 . '</li>';
            }
            if ($asignacion['hora_inicio6'] != '00:00:00') {
                $html .= '<li>' . $asignacion['dia_semana6'] . ' De ' . $horaInicio6 . ' a ' . $horaFin6 . '</li>';
            }


            $html .= '</ul></td>
                    <td style="text-align:center">' . $asignacion['grupo'] .
                '</td>
                    </tr>';
        }
    }



    // Aún no sirve
    public function generarPDF($carrera_id)
    {
        $time = new \CodeIgniter\I18n\Time();
        setlocale(LC_TIME, 'es');

        $this->session = \Config\Services::session();
        $docenteModel = new UsuarioModel();
        $docentes = $docenteModel->where('rol', 'docente')->findAll();


        // $db = \Config\Database::connect();
        // $carrera = $db->query('select c.nombre as carrera from carreras as c join programacion as p on p.carrera_id = c.id left join carreras_docentes as dc on dc.carrera = c.id')->getResultArray();


        $asignaturaModel = new AsignaturaModel();
        $claveAsignatura = $asignaturaModel->select('asignaturas.clave as cm')->join('programacion', 'asignaturas.id = programacion.materia_id', 'left')->findAll();


        // $db = \Config\Database::connect();
        // $asignacionesCarrera = $db->query('select p.*, p.carrera_id, c.nombre as carrera, p.docente_id as pd, ac.id as ida, a.id as aid, a.nombre as nombremateria, a.clave as cm from programacion as p left join asignaturas_carreras as ac on ac.id = p.materia_id left join asignaturas as a on p.materia_id = a.id left join  carreras as c on p.carrera_id = c.id')->getResultArray();


        $peModel = new PeriodoEscolarModel();
        $periodo = $peModel->where('id', 1)->find();
        $fechaInicioPE = $periodo[0]['fecha_inicio'];
        $fechaInicioP = \DateTime::createFromFormat('Y-m-d', $fechaInicioPE);
        // $fechaInicioPEH = $fechaInicioP->format('d \d\e M \d\e Y');
        $fechaInicioPEH = strftime('%d de %B de %Y', $fechaInicioP->getTimestamp());

        $fechaFinPE = $periodo[0]['fecha_fin'];
        $fechaFinP = \DateTime::createFromFormat('Y-m-d', $fechaFinPE);
        $fechaFinPEH = strftime('%d de %B de %Y', $fechaFinP->getTimestamp());


        $fechaA = Time::now('America/Mexico_City', 'es_ES');
        // $fechaActual = date('Y-m-d');
        // $fechaA = \DateTime::createFromFormat('Y-m-d', $fechaActual);
        $fechaActualH = strtoupper(strftime('%d de %B de %Y', $fechaA->getTimestamp()));


        $pdf = new \TCPDF();

        $pdf->setMargins(20, 20, 20, false);
        $pdf->SetFont('', 'B', 10);


        foreach ($docentes as $docente) {


            $asignaciones = $this->getAsignacionesDocente($docente['id']);

            foreach ($asignaciones as $a) {
                if ($a['carrera_id'] == 1) {
                    $carreraN = 'LICENCIATURA EN ADMINISTRACIÓN EDUCATIVA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 3) {
                    $carreraN = 'LICENCIATURA EN PSICOLOGÍA EDUCATIVA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 5) {
                    $carreraN = 'LICENCIATURA EN INTERVENCIÓN EDUCATIVA B-LEARNING';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 6) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN E INNOVACIÓN PEDAGOGÍCA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 7) {
                    $carreraN = 'MAESTRÍA EN EDUCACIÓN BÁSICA';
                    $periodo = 'del 18 de noviembre de 2023 al 18 de febrero de 2024';
                } elseif ($a['carrera_id'] == 8) {
                    $carreraN = 'MAESTRÍA EN EDUCACIÓN MEDIA SUPERIOR';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 9) {
                    $carreraN = 'MAESTRÍA EN DIDÁCTICA DE LENGUAS Y CULTURAS INDOAMERICANAS';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 10) {
                    $carreraN = 'LICENCIATURA EN PEDAGOGÍA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 11) {
                    $carreraN = 'LICENCIATURA EN INTERVENCIÓN EDUCATIVA ESCOLARIZADA';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 12) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE AYOTOXCO)';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 13) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE HUEYAPAN)';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 14) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE ZAPOTITLÁN)';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } elseif ($a['carrera_id'] == 15) {
                    $carreraN = 'LICENCIATURA EN EDUCACIÓN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA (SEDE GUADALUPE VICTORIA)';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                } else {
                    $carreraN = 'CURSO SEPA INGLES ';
                    $periodo = 'del 29 de enero al 07 de junio de 2024';
                }
            }


            $textoDocenteVisitante = 'En virtud de reunir características académicas y profesionales específicas; se le ha asignado el siguiente curso en ' . $carreraN . ', que corresponde al periodo ' . $periodo . '.
        ';

            $textoDocenteDeBase = 'En virtud de reunir características académicas y Profesionales Específicas y con base en el Reglamento Interior de Trabajo del Personal Docente de la Universidad Pedagógica Nacional, Título Octavo, Distribución de Labores, Jornada de Trabajo, Salario, Licencias y Comisiones, Capítulo I de la Distribución de Labores, Artículos 52 y 53, se le ha asignado el siguiente curso en la ' . $carreraN . ', que corresponde al periodo ' . $periodo . '.
        ';

            if ($docente['condicion'] == "DE BASE") {
                $texto = $textoDocenteDeBase;
            } else {
                $texto = $textoDocenteVisitante;
            }


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


            foreach ($asignaciones as $asignacion) {
                $horaInicio1 = date('H:i', strtotime($asignacion['hora_inicio1']));
                $horaInicio2 = date('H:i', strtotime($asignacion['hora_inicio2']));
                $horaInicio3 = date('H:i', strtotime($asignacion['hora_inicio3']));
                $horaInicio4 = date('H:i', strtotime($asignacion['hora_inicio4']));
                $horaInicio5 = date('H:i', strtotime($asignacion['hora_inicio5']));
                $horaInicio6 = date('H:i', strtotime($asignacion['hora_inicio6']));

                $horaFin1 = date('H:i', strtotime($asignacion['hora_fin1']));
                $horaFin2 = date('H:i', strtotime($asignacion['hora_fin2']));
                $horaFin3 = date('H:i', strtotime($asignacion['hora_fin3']));
                $horaFin4 = date('H:i', strtotime($asignacion['hora_fin4']));
                $horaFin5 = date('H:i', strtotime($asignacion['hora_fin5']));
                $horaFin6 = date('H:i', strtotime($asignacion['hora_fin6']));


                $pdf->setFont('', '', 8);
                $html .= '<tr>' .

                    '<td>' . $asignacion['claveAsignatura'] . '</td>
                    <td>' . $asignacion['nombreAsignatura'] . '</td>';
                $html .= '<td>';

                if (!empty($asignacion['fecha_inicio_modular']) && ($asignacion['fecha_inicio_modular'] != '0000-00-00')) {
                    $html .= 'Del ' . $asignacion['fecha_inicio_modular'] . ' al ' . $asignacion['fecha_fin_modular'];
                }

                if ($asignacion['hora_inicio1'] != '00:00:00') {
                    $html .= $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '<br>';
                }
                if ($asignacion['hora_inicio2'] != '00:00:00') {
                    $html .= $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>';
                }
                if ($asignacion['hora_inicio3'] != '00:00:00') {
                    $html .= $asignacion['dia_semana3'] . ' De ' . $horaInicio3 . ' a ' . $horaFin3 . '<br>';
                }
                if ($asignacion['hora_inicio4'] != '00:00:00') {
                    $html .= $asignacion['dia_semana4'] . ' De ' . $horaInicio4 . ' a ' . $horaFin4 . '<br>';
                }
                if ($asignacion['hora_inicio5'] != '00:00:00') {
                    $html .= $asignacion['dia_semana5'] . ' De ' . $horaInicio5 . ' a ' . $horaFin5 . '<br>';
                }
                if ($asignacion['hora_inicio6'] != '00:00:00') {
                    $html .= $asignacion['dia_semana6'] . ' De ' . $horaInicio6 . ' a ' . $horaFin6;
                }

                /*
                if($asignacion['hora_inicio2'] != '00:00:00') {
                    $html .= $asignacion['dia_semana1'] . ' De ' . $horaInicio1 . ' a ' . $horaFin1 . '<br>';
                    $html .= $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2 . '<br>';
                    $html .= $asignacion['dia_semana3'] . ' De ' . $horaInicio3 . ' a ' . $horaFin3 . '<br>';
                    $html .= $asignacion['dia_semana4'] . ' De ' . $horaInicio4 . ' a ' . $horaFin4 . '<br>';
                    $html .= $asignacion['dia_semana5'] . ' De ' . $horaInicio5 . ' a ' . $horaFin5 . '<br>';
                    $html .= $asignacion['dia_semana6'] . ' De ' . $horaInicio6 . ' a ' . $horaFin6 . '<br>';
            }
            */


                // $html .= $asignacion['dia_semana2'] . ' De ' . $horaInicio2 . ' a ' . $horaFin2;

                $html .= '</td>
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


        }

        $pdf->Output('constancia.pdf', 'I');
        exit();

    }


}