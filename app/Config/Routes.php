<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'UserController::login');

// Rutas para resetear contraseña
$routes->get('password/request-reset', 'ResetPassword::requestReset');
$routes->post('password/send-reset-link', 'ResetPassword::sendResetLink');
$routes->get('password/reset/(:any)', 'ResetPassword::reset/$1');
$routes->post('password/update-password', 'ResetPassword::updatePassword');

$routes->get('areas', 'AreaController::index');
$routes->get('registro', 'RegistroController::new');
$routes->post('registro', 'RegistroController::create');
$routes->get('dc', 'DocentesCarrerasController::index');
$routes->get('estatusDelPersonal', 'EstatusDelPersonalController::index');

$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);

// Rutas para el administrador
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');

    // Imprimir todas las asignaciones de horarios generadas en todas las carreras
    $routes->get('programacion/printAll', 'Admin\ProgramacionController::printAll');

    $routes->post('carreras/eliminar-asignacion', 'Admin\ProgramacionController::eliminarAsignacion');

    $routes->get('carreras/editar_horario/(:num)/(:num)', 'Admin\CarreraController::editar_horario/$1/$2');
    $routes->post('carreras/editar_horario/(:num)/(:num)', 'Admin\CarreraController::editar_horario/$1/$2');

    $routes->get('carreras/exportarPDF/(:num)', 'Admin\ProgramacionController::exportarPDF/$1');

    $routes->get('carreras/agregar_horario/(:num)', 'Admin\CarreraController::agregar_horario/$1');
    $routes->post('carreras/agregar_horario/(:num)', 'Admin\CarreraController::agregar_horario/$1');
    $routes->get('carreras/asignaciones/(:num)', 'Admin\CarreraController::asignaciones/$1');
    // $routes->post('carreras/asignaciones/(:num)', 'Admin\CarreraController::asignaciones/$1');
    // $routes->add('carreras/eliminar-asignacion/(:num)', 'Admin\CarreraController::eliminarAsignacionX/$1');
    $routes->get('dc', 'DocentesCarrerasController::index');
    $routes->get('carreras/vdxc/(:num)', 'Admin\CarreraController::verDocentes/$1');
    $routes->get('carreras/asignarDocentes/(:num)', 'Admin\CarreraController::asignarDocentes/$1');
    $routes->post('carreras/guardarAsignacion', 'Admin\CarreraController::guardarAsignacion');

    $routes->get('carreras/vaxc/(:num)', 'Admin\CarreraController::verAsignaturas/$1');
    $routes->get('carreras/asignarAsignaturas/(:num)', 'Admin\CarreraController::asignarAsignaturas/$1');
    $routes->post('carreras/guardarAsignacionAsignaturas', 'Admin\CarreraController::guardarAsignacionAsignaturas');
    $routes->get('carreras/eliminarAsignacion/(:num)', 'Admin\CarreraController::eliminarAsignacion/$1');
    $routes->get('carreras/eliminarAsignacionAsignatura/(:num)', 'Admin\CarreraController::eliminarAsignacionAsignatura/$1');

    $routes->get('usuarios/edit_password/(:num)', 'Admin\UsuarioController::editPassword/$1'); // Mostrar formulario para editar la contraseña
    $routes->post('usuarios/update_password/(:num)', 'Admin\UsuarioController::updatePassword/$1'); // Actualizar la contraseña del usuario

    $routes->get('usuarios/ud', 'Admin\UsuarioController::usuariosDocentes');
    $routes->get('usuarios/id/(:num)', 'Admin\UsuarioController::showDocente/$1');  

    // Ruta para horarios
    $routes->get('horario', 'HorarioController::horario');

    // Rutas para mapa curricular
    $routes->get('mp', 'Admin\MapaCurricular::index');

    // Rutas para carreras

    // Rutas para información de docente
    $routes->get('dinfo', 'Admin\DocenteInfoController::index');

    // Rutas para docentes
    $routes->get('docentes', 'Admin\DocenteController::index');
    $routes->get('docentes/create', 'Admin\DocenteController::create');
    $routes->post('docentes/store', 'Admin\DocenteController::store');
    $routes->get('docentes/idd', 'Admin\DocenteController::informacionDelDocente');

    // Rutas tipo resource
    $routes->get('usuarios', 'Admin\UsuarioController::index');
    $routes->get('usuarios/create', 'Admin\UsuarioController::create');
    $routes->post('usuarios/store', 'Admin\UsuarioController::store');
    $routes->get('usuarios/edit/(:num)', 'Admin\UsuarioController::edit/$1');
    $routes->post('usuarios/update/(:num)', 'Admin\UsuarioController::update/$1');
    $routes->get('usuarios/delete/(:num)', 'Admin\UsuarioController::delete/$1');
    $routes->get('usuarios/crearCoordinador', 'Admin\UsuarioController::crearCoordinador');
    $routes->post('usuarios/storeCoordinador', 'Admin\UsuarioController::storeCoordinador');

    $routes->get('programacion/getAsignaturas/(:num)', 'ProgramacionController::getAsignaturas/$1');
    $routes->get('programacion/get_docentes_by_carrera/(:num)', 'ProgramacionController::getDocentesByCarrera/$1');
    // $routes->get('programacion/get_docentes_by_carrera/(:num)', 'ProgramacionController::getDocentesByCarrera/$1');

    $routes->post('programacion/asignaturasPorCarrera', 'ProgramacionController::asignaturasPorCarrera');
    $routes->get('programacion/getAsignaturasByCarrera/(:num)', 'ProgramacionController::getAsignaturasByCarrera/$1');
    $routes->get('programacion/getDocentesByCarrera/(:num)', 'ProgramacionController::getDocentesByCarrera/$1');

    $routes->get('programacion/getAsignaturasPorCarrera/(:num)', 'ProgramacionController::getAsignaturasPorCarrera/$1');
    $routes->get('programacion/obtenerAsignaturas', 'ProgramacionController::obtenerAsignaturas');

    $routes->get('programacion/createxd', 'ProgramacionController::createxdocente');
    $routes->post('programacion/storexd', 'ProgramacionController::storexdocente');

    $routes->get('programacion/createtbl', 'ProgramacionController::create_table');

    $routes->get('programacion', 'ProgramacionController::index');
    $routes->get('programacion/create', 'ProgramacionController::create');
    $routes->post('programacion/store', 'ProgramacionController::store');
    $routes->get('programacion/edit/(:num)', 'ProgramacionController::edit/$1');
    $routes->post('programacion/update/(:num)', 'ProgramacionController::update/$1');
    $routes->get('programacion/delete/(:num)', 'ProgramacionController::delete/$1');

    // RUTAS DE TIPO RESOURCE
    $routes->resource('asignaturas', ['controller' => 'Admin\AsignaturaController']);
    $routes->resource('carreras', ['controller' => 'Admin\CarreraController']);
    $routes->resource('grupos', ['controller' => 'Admin\GrupoController']);
    $routes->resource('pescolares', ['controller' => 'Admin\PeriodoEscolarController']);
    $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
});


// Rutas para el coordinador
$routes->group('coordinador', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Coordinador\CoordinadorController::index');
    // $routes->get('programacion/asignar', 'Coordinador\ProgramacionController::asignarHorario');
    $routes->get('programacion/create/(:num)', 'Coordinador\ProgramacionController::create/$1');
    $routes->post('programacion/create/(:num)', 'Coordinador\ProgramacionController::create/$1');
    $routes->get('programacion/index/(:num)', 'Coordinador\ProgramacionController::index/$1');
    $routes->get('programacion/update/(:num)', 'Coordinador\ProgramacionController::update/$1');
    $routes->post('programacion/update/(:num)', 'Coordinador\ProgramacionController::update/$1');
    $routes->get('programacion/delete/(:num)', 'Coordinador\ProgramacionController::delete/$1');
    $routes->get('programacion/getAsignaturas/(:num)', 'Coordinador\ProgramacionController::getAsignaturas/$1');
    $routes->get('programacion/get_docentes_by_carrera/(:num)', 'Coordinador\ProgramacionController::getDocentesByCarrera/$1');
    // $routes->get('programacion/get_docentes_by_carrera/(:num)', 'ProgramacionController::getDocentesByCarrera/$1');

    $routes->post('programacion/asignaturasPorCarrera', 'Coordinador\ProgramacionController::asignaturasPorCarrera');
    $routes->get('programacion/getAsignaturasByCarrera/(:num)', 'Coordinador\ProgramacionController::getAsignaturasByCarrera/$1');
    $routes->get('programacion/getDocentesByCarrera/(:num)', 'Coordinador\ProgramacionController::getDocentesByCarrera/$1');

    $routes->get('programacion/getAsignaturasPorCarrera/(:num)', 'Coordinador\ProgramacionController::getAsignaturasPorCarrera/$1');
    $routes->get('programacion/obtenerAsignaturas', 'Coordinador\ProgramacionController::obtenerAsignaturas');

    $routes->get('programacion', 'Coordinador\ProgramacionController::index');

    $routes->get('docentes/x', 'Coordinador\UsuarioController::index2');

    $routes->get('usuarios/edit_password/(:num)', 'Coordinador\UsuarioController::editPassword/$1'); // Mostrar formulario para editar la contraseña
    $routes->post('usuarios/update_password/(:num)', 'Coordinador\UsuarioController::updatePassword/$1'); // Actualizar la contraseña del usuario

    $routes->get('usuarios/ud', 'Coordinador\UsuarioController::usuariosDocentes');

    // Rutas tipo resource
    // $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
    $routes->get('usuarios', 'Coordinador\UsuarioController::index');
    $routes->get('usuarios/create', 'Coordinador\UsuarioController::create');
    $routes->post('usuarios/store', 'Coordinador\UsuarioController::store');
    $routes->get('usuarios/edit/(:num)', 'Coordinador\UsuarioController::edit/$1');
    $routes->post('usuarios/update/(:num)', 'Coordinador\UsuarioController::update/$1');
    $routes->get('usuarios/delete/(:num)', 'Coordinador\UsuarioController::delete/$1');

    // Rutas para información de docente
    $routes->get('dinfo', 'Coordinador\DocenteInfoController::index');
    // Rutas para docentes
    $routes->get('docentes', 'Coordinador\DocenteController::index');
    $routes->get('docentes/create', 'Coordinador\DocenteController::create');
    $routes->post('docentes/store', 'Coordinador\DocenteController::store');
    $routes->get('docentes/idd', 'Coordinador\DocenteController::informacionDelDocente');

    // RUTAS DE TIPO RESOURCE
    $routes->resource('asignaturas', ['controller' => 'Coordinador\AsignaturaController']);
    $routes->resource('carreras', ['controller' => 'Coordinador\CarreraController']);
    $routes->resource('grupos', ['controller' => 'Coordinador\GrupoController']);
    $routes->resource('pescolares', ['controller' => 'Coordinador\PeriodoEscolarController']);
});


// Rutas para el docente
$routes->group('docente', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Docente\DocenteController::index');
    $routes->get('horarios', 'Docente\ProgramacionController::index');
    $routes->get('horarios/generar_constancia/(:num)', 'Docente\ProgramacionController::generarConstancia/$1');

    $routes->group('docenteinfo', ['namespace' => 'App\Controllers'], function ($routes) {
        $routes->get('', 'Docente\DocenteInfoController::index');
        $routes->get('create', 'Docente\DocenteInfoController::create');
        $routes->post('store', 'Docente\DocenteInfoController::store');
        $routes->get('edit/(:num)', 'Docente\DocenteInfoController::edit/$1');
        $routes->post('update/(:num)', 'Docente\DocenteInfoController::update/$1');
        $routes->add('delete/(:num)', 'Docente\DocenteInfoController::delete/$1');
    });

    $routes->group('expediente', ['namespace' => 'App\Controllers'], function($routes) {
        $routes->get('/', 'Docente\ExpedienteController::index');
        $routes->get('create', 'Docente\ExpedienteController::create');
        $routes->post('store', 'Docente\ExpedienteController::store');
        $routes->get('edit/(:num)', 'Docente\ExpedienteController::edit/$1');
        $routes->post('update/(:num)', 'Docente\ExpedienteController::update/$1');
        $routes->get('delete/(:num)', 'Docente\ExpedienteController::delete/$1');
    });
});

// Rutas para el alumno
$routes->group('alumno', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Alumno\AlumnoController::index');
});

$routes->get('logout', 'UserController::logout');
$routes->get('logoutd', 'DocenteController::logoutd');
