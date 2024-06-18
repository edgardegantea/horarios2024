<?= $this->extend('template/bodyDocente') ?>
<?= $this->section('content'); ?>

    <h2>Asignaciones de Horarios para <?= $docente['nombre'] . " " . $docente['apaterno'] . " " . $docente['amaterno']; ?></h2>

    

<?php if (empty($asignaciones)): ?>
    <p>No hay asignaciones de horarios disponibles.</p>
<?php else: ?>

    <a href="<?= site_url("docente/horarios/generar_constancia/{$docente['id']}"); ?>" target="_blank" class="btn btn-primary">Generar Constancia PDF</a>
    

    <table id="example" class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Carrera</th>
            <th>Asignatura</th>
            <th>Horario</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($asignaciones as $asignacion): ?>
            <tr>
                <td><?= $asignacion['carrera']; ?></td>
                <td><?= $asignacion['asignatura']; ?></td>
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
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?= $this->endSection(); ?>