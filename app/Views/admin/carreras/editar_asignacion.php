<?= $this->extend('template/body') ?>
<?= $this->section('content'); ?>




<form action="<?= base_url('admin/carreras/actualizar/{$asignacion_id}'); ?>"></form>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="docente">Docente:</label>
            <select class="form-control" name="docente" id="docente">
                <?php foreach ($docentes as $docente): ?>
                    <option class="text-uppercase" value="<?= $docente['id']; ?>"><?= $docente['nombre'] . ' ' . $docente['apaterno'] . ' ' . $docente['amaterno']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="asignatura">Asignatura:</label>
            <select class="form-control" name="asignatura" id="asignatura">
                <?php foreach ($asignaturas as $asignatura): ?>
                    <option value="<?= $asignatura['id']; ?>"><?= $asignatura['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="grupo">Especificar grupo:</label>
            <!-- <input class="form-control" type="text" name="grupo" id="grupo" value="<?= old('grupo'); ?>"> -->
            <select class="form-control" name="grupo">
                <?php for ($semestre = 1; $semestre <= 10; $semestre++): ?>
                    <?php for ($letra = 'A'; $letra <= 'G'; $letra++): ?>
                        <option value="<?= $semestre . $letra; ?>">Semestre <?= $semestre ?> - Grupo <?= $letra; ?></option>
                    <?php endfor; ?>
                <?php endfor; ?>
            </select>
        </div>




    </div>
</div>





<hr>
<h2>Llenar esta sección para el sistema escolarizado</h2>

<h4>Día 1</h4>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="dia_semana1">Día de la semana:</label>
            <select name="dia_semana1" id="dia_semana1">
                <option value="Lunes" <?= old('dia_semana1') === 'Lunes' ? 'selected' : ''; ?>>Lunes</option>
                <option value="Martes" <?= old('dia_semana1') === 'Martes' ? 'selected' : ''; ?>>Martes</option>
                <option value="Miércoles" <?= old('dia_semana1') === 'Miércoles' ? 'selected' : ''; ?>>Miércoles</option>
                <option value="Jueves" <?= old('dia_semana1') === 'Jueves' ? 'selected' : ''; ?>>Jueves</option>
                <option value="Viernes" <?= old('dia_semana1') === 'Viernes' ? 'selected' : ''; ?>>Viernes</option>
                <option value="Sábado" <?= old('dia_semana1') === 'Sábado' ? 'selected' : ''; ?>>Sábado</option>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="hora_inicio1">Inicia:</label>
            <input type="time" name="hora_inicio1" id="hora_inicio1" value="<?= old('hora_inicio1'); ?>">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="hora_fin1">Finaliza:</label>
            <input type="time" name="hora_fin1" id="hora_fin1" value="<?= old('hora_fin1'); ?>">
        </div>
    </div>
</div>


<hr>
<h4>Día 2</h4>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="dia_semana2">Día de la semana:</label>
            <select name="dia_semana2" id="dia_semana2">
                <option value="Lunes" <?= old('dia_semana2') === 'Lunes' ? 'selected' : ''; ?>>Lunes</option>
                <option value="Martes" <?= old('dia_semana2') === 'Martes' ? 'selected' : ''; ?>>Martes</option>
                <option value="Miércoles" <?= old('dia_semana2') === 'Miércoles' ? 'selected' : ''; ?>>Miércoles</option>
                <option value="Jueves" <?= old('dia_semana2') === 'Jueves' ? 'selected' : ''; ?>>Jueves</option>
                <option value="Viernes" <?= old('dia_semana2') === 'Viernes' ? 'selected' : ''; ?>>Viernes</option>
                <option value="Sábado" <?= old('dia_semana2') === 'Sábado' ? 'selected' : ''; ?>>Sábado</option>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="hora_inicio2">Inicia:</label>
            <input type="time" name="hora_inicio2" id="hora_inicio2" value="<?= old('hora_inicio2'); ?>">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="hora_fin2">Finaliza:</label>
            <input type="time" name="hora_fin2" id="hora_fin2" value="<?= old('hora_fin2'); ?>">
        </div>
    </div>
</div>

<hr />
<h2 class="mt-5">Llenar esta sección para el sistema modular</h2>


<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="fecha_inicio_modular">Fecha de inicio:</label>
                <input class="form-control" type="date" name="fecha_inicio_modular" id="fecha_inicio_modular">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="fecha_fin_modular">Fecha de finalización:</label>
                <input class="form-control" type="date" name="fecha_fin_modular" id="fecha_fin_modular">
            </div>
        </div>
    </div>
</div>





<div class="mt-5">
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar Asignación</button>
    </div>
</div>

</form>

<?= $this->endSection(); ?>
