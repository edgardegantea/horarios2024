<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <h2>Asignaciones de Horarios para Carrera <?= $carrera['nombre']; ?></h2>
<div class="mt-1 mb-1">
    <?= anchor("admin/carreras/agregar_horario/{$carrera['id']}", 'Agregar Horario', 'class="btn btn-danger"'); ?>
</div>




<?php if (empty($asignaciones)): ?>
    <p>No hay asignaciones de horarios disponibles.</p>
<?php else: ?>
    <table id="example" class="table-striped table table-hover">
        <thead>
        <tr>
            <th>Carrera</th>
            <th>Docente</th>
            <th>Asignatura</th>
            <th>Grupo</th>
            <th>Horario</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($asignaciones as $asignacion): ?>
            <tr>
                <td><?= $carrera['nombre']; ?></td>
                <td><?= $asignacion['docente']; ?></td>
                <td><?= $asignacion['asignatura']; ?></td>
                <td><?= $asignacion['grupo']; ?></td>
                <td>
                    <?php if (($asignacion['fecha_inicio_modular'] != '0000-00-00')): ?>
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
                    <a href="/admin/carreras/editar_horario/<?php echo $asignacion['carrera_id']; ?>/<?php echo $asignacion['id']; ?>"class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                    <form action="<?= site_url('admin/carreras/eliminar-asignacion'); ?>" method="post">
                        <input type="hidden" name="asignacion_id" value="<?= $asignacion['id']; ?>">
                        <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>

                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?= $this->endSection(); ?>