<?= $this->extend('template/body') ?>
<?= $this->section('content'); ?>

<div>
    <h3>Actualización de datos de la asignación de horario</h3>
</div>



<form method="post" action="/admin/carreras/editar_horario/<?php echo $carrera_id; ?>/<?php echo $asignacion['id']; ?>">

<input type="hidden" name="asignacion_id" value="<?php echo $asignacion['id']; ?>">


<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label for="periodo_academico">Periodo académico:</label>
            <select class="form-control" name="periodo_academico" id="periodo_academico">
                <?php foreach($periodoescolar as $pe): ?>
                    <option value="<?= $pe['id'] ?>"><?= $pe['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="docente">Docente:</label>
            <select class="form-control" name="docente" id="docente">
                <?php foreach ($docentes as $docente) : ?>
                    <option value="<?php echo $docente['id']; ?>" <?php echo ($asignacion['docente_id'] == $docente['id']) ? 'selected' : ''; ?>><?php echo '(' . $docente['username'] . ') ' . $docente['nombre'] . ' ' . $docente['apaterno'] . ' ' . $docente['amaterno']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="asignatura">Asignatura:</label>
            <select class="form-control" name="asignatura" id="asignatura">
                <?php foreach ($asignaturas as $asignatura) : ?>
                    <option value="<?php echo $asignatura['id']; ?>" <?php echo ($asignacion['materia_id'] == $asignatura['id']) ? 'selected' : ''; ?>><?php echo $asignatura['clave'] . ' - ' . $asignatura['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="grupo">Especificar grupo:</label>
            <!-- <input class="form-control" type="text" name="grupo" id="grupo" value="<?= old('grupo'); ?>"> -->
            <select class="form-control" name="grupo">
                <?php for ($semestre = 1; $semestre <= 16; $semestre++): ?>
                    <?php for ($letra = 'A'; $letra <= 'G'; $letra++): ?>
                        <option value="<?= $semestre . $letra; ?>" <?php echo $asignacion['grupo'] ?>>
                            Semestre <?= $semestre ?> - Grupo <?= $letra; ?></option>
                    <?php endfor; ?>
                <?php endfor; ?>
            </select>
        </div>
    </div>
</div>



<hr>
<h2>Editar esta sección para el sistema escolarizado</h2>

<table class="table table-justify table-bordered">

    <tr>
        <td>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dia_semana2">Lunes:</label>
                        <input type="hidden" name="dia_semana1" value="Lunes">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_inicio2">Inicia:</label>
                        <input type="time" name="hora_inicio1" id="hora_inicio1" value="<?= $asignacion['hora_inicio1']; ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_fin2">Finaliza:</label>
                        <input type="time" name="hora_fin1" id="hora_fin1" value="<?= $asignacion['hora_fin1']; ?>">
                    </div>
                </div>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dia_semana2">Martes:</label>
                        <input type="hidden" name="dia_semana2" value="Martes">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_inicio2">Inicia:</label>
                        <input type="time" name="hora_inicio2" id="hora_inicio2" value="<?= $asignacion['hora_inicio2']; ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_fin2">Finaliza:</label>
                        <input type="time" name="hora_fin2" id="hora_fin2" value="<?= $asignacion['hora_fin2']; ?>">
                    </div>
                </div>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dia_semana2">Miércoles:</label>
                        <input type="hidden" name="dia_semana3" value="Miércoles">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_inicio2">Inicia:</label>
                        <input type="time" name="hora_inicio3" id="hora_inicio3" value="<?= $asignacion['hora_inicio3']; ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_fin2">Finaliza:</label>
                        <input type="time" name="hora_fin3" id="hora_fin3" value="<?= $asignacion['hora_fin3']; ?>">
                    </div>
                </div>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dia_semana2">Jueves:</label>
                        <input type="hidden" name="dia_semana4" value="Jueves">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_inicio2">Inicia:</label>
                        <input type="time" name="hora_inicio4" id="hora_inicio4" value="<?= $asignacion['hora_inicio4']; ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_fin2">Finaliza:</label>
                        <input type="time" name="hora_fin4" id="hora_fin4" value="<?= $asignacion['hora_fin4']; ?>">
                    </div>
                </div>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dia_semana2">Viernes:</label>
                        <input type="hidden" name="dia_semana5" value="Viernes">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_inicio2">Inicia:</label>
                        <input type="time" name="hora_inicio5" id="hora_inicio5" value="<?= $asignacion['hora_inicio5']; ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_fin2">Finaliza:</label>
                        <input type="time" name="hora_fin5" id="hora_fin5" value="<?= $asignacion['hora_fin5']; ?>">
                    </div>
                </div>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dia_semana2">Sábado:</label>
                        <input type="hidden" name="dia_semana6" value="Sábado">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_inicio2">Inicia:</label>
                        <input type="time" name="hora_inicio6" id="hora_inicio6" value="<?= $asignacion['hora_inicio6']; ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_fin2">Finaliza:</label>
                        <input type="time" name="hora_fin6" id="hora_fin6" value="<?= $asignacion['hora_fin6']; ?>">
                    </div>
                </div>
            </div>
        </td>
    </tr>


    <tr>
        <td>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dia_semana7">Domingo:</label>
                        <input type="hidden" name="dia_semana7" value="Domingo">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_inicio7">Inicia:</label>
                        <input type="time" name="hora_inicio7" id="hora_inicio7" value="<?= $asignacion['hora_inicio7']; ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="hora_fin7">Finaliza:</label>
                        <input type="time" name="hora_fin7" id="hora_fin7" value="<?= $asignacion['hora_fin7']; ?>">
                    </div>
                </div>
            </div>
        </td>
    </tr>

</table>




<hr>

<h2 class="mt-5">Editar esta sección para el sistema modular</h2>


<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="fecha_inicio_modular">Fecha de inicio:</label>
                <input class="form-control" type="date" name="fecha_inicio_modular" id="fecha_inicio_modular" value="<?= $asignacion['fecha_inicio_modular'] ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="fecha_fin_modular">Fecha de finalización:</label>
                <input class="form-control" type="date" name="fecha_fin_modular" id="fecha_fin_modular" value="<?= $asignacion['fecha_fin_modular'] ?>">
            </div>
        </div>
    </div>
</div>







<div class="mt-5">
    <div class="form-group">
        <button class="btn btn-danger" type="submit">Guardar cambios</button>
    </div>
</div>

</form>

<?= $this->endSection(); ?>
