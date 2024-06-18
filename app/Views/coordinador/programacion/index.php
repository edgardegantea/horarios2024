<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>


<h1>Asignaciones de Horarios para Docentes de la Carrera <?= $nombreCarrera[0]['nombre'] ?></h1>

<!--
<?php foreach ($asignaciones as $asignacion): ?>
    <a class="btn btn-primary mt-1 mb-1" href="<?= base_url('coordinador/programacion/create/' . $asignacion['carrera_id']) ?>">Nueva asignación</a>
<?php endforeach; ?>
-->

    <a class="btn btn-primary mt-1 mb-1" href="<?= base_url('coordinador/programacion/create/' . $asignacion['carrera_id']) ?>">Nueva asignación</a>
<table id="example" class="table table-justify table-bordered table-stripped">
    <thead>
        <tr>
            <th>DOCENTE</th>
            <th>ASIGNATURA</th>
            <th>GRUPO</th>
            <th>HORARIO</th>
            <th>ACCIONES</th>
            <!-- Agrega más columnas según sea necesario -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($asignaciones as $asignacion): ?>
            <tr>
                <td><?= $asignacion['docente'] ?></td>
                <td><?= $asignacion['asignatura']; ?></td>
                <td><?= $asignacion['grupo'] ?></td>
                <td>
                    <?php if ($asignacion['fecha_inicio_modular'] !== null): ?>
                        Del <?= $asignacion['fecha_inicio_modular']; ?>
                        Al <?= $asignacion['fecha_fin_modular']; ?>
                    <?php else: ?>
                        <?php if ($asignacion['hora_inicio1'] != '00:00:00'): ?>
                            <?= $asignacion['dia_semana1']; ?>
                            <?= $asignacion['hora_inicio1']; ?>
                            <?= $asignacion['hora_fin1']; ?>
                        <?php endif; ?>
                        <br>
                        <?php if ($asignacion['hora_inicio2'] != '00:00:00'): ?>
                            <?= $asignacion['dia_semana2']; ?>
                            <?= $asignacion['hora_inicio2']; ?>
                            <?= $asignacion['hora_fin2']; ?>
                        <?php endif; ?>
                        <br>
                        <?php if ($asignacion['hora_inicio3'] != '00:00:00'): ?>
                            <?= $asignacion['dia_semana3']; ?>
                            <?= $asignacion['hora_inicio3']; ?>
                            <?= $asignacion['hora_fin3']; ?>
                        <?php endif; ?>
                        <br>
                        <?php if ($asignacion['hora_inicio4'] != '00:00:00'): ?>
                            <?= $asignacion['dia_semana4']; ?>
                            <?= $asignacion['hora_inicio4']; ?>
                            <?= $asignacion['hora_fin4']; ?>
                        <?php endif; ?>
                        <br>
                        <?php if ($asignacion['hora_inicio5'] != '00:00:00'): ?>
                            <?= $asignacion['dia_semana5']; ?>
                            <?= $asignacion['hora_inicio5']; ?>
                            <?= $asignacion['hora_fin5']; ?>
                        <?php endif; ?>
                        <br>
                        <?php if ($asignacion['hora_inicio6'] != '00:00:00'): ?>
                            <?= $asignacion['dia_semana6']; ?>
                            <?= $asignacion['hora_inicio6']; ?>
                            <?= $asignacion['hora_fin6']; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-outline-info" href="<?= base_url('coordinador/programacion/update/' . $asignacion['id']) ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-outline-danger" href="javascript:void(0);" onclick="confirmDelete(<?php echo $asignacion['id']; ?>)"><i class="fas fa-trash"></i></a>
                </td>
                <!-- Agrega más celdas según sea necesario -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
    function confirmDelete(asignacionId) {
        if (confirm('¿Estás seguro de que deseas eliminar esta asignación?')) {
            window.location.href = '/coordinador/programacion/delete/' + asignacionId;
        }
    }
</script>

    
<?= $this->endSection(); ?>