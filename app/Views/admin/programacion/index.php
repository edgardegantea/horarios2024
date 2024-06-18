<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>



    <h1>Horarios</h1>
    <a class="btn btn-primary mb-3" href="<?= site_url('admin/programacion/create') ?>">Asignar Horario</a>
    <a class="btn btn-primary mb-3" href="<?= site_url('admin/programacion/createxd') ?>">Asignar horario por docente</a>
    <table id="example" class="table table-justify table-bordered table-stripped">
        <thead>
            <th>ID</th>
            <th>ASIGNATURA</th>
            <th>DOCENTE</th>
            <th>CARRERA</th>
            <th>HORARIO</th>
            <th>Acciones</th>
        </thead>

        <tbody>
        <?php foreach ($programacion as $programa) : ?>
            <tr>
                <td><?= $programa['id']; ?></td>
                <td><?= $programa['materia_id']; ?></td>
                <td><span class="text-uppercase"><?= $programa['docente']; ?></span></td>
                <td><?= $programa['carrera']; ?></td>
                <td class="text-center">
                    <?php if ($programa['dia_semana1'] == 1): ?>
                        Lunes
                    <?php elseif ($programa['dia_semana1'] == 2): ?>
                        Martes
                    <?php elseif ($programa['dia_semana1'] == 3): ?>
                        Miércoles
                    <?php elseif ($programa['dia_semana1'] == 4): ?>
                        Jueves
                    <?php elseif ($programa['dia_semana1'] == 5): ?>
                        Viernes
                    <?php else: ?>
                        Sábado
                    <?php endif; ?>

                    <p>
                        <?= $programa['hora_inicio1']; ?> -
                        <?= $programa['hora_fin1'] ?>
                    </p>

                    <hr>
                    <?php if ($programa['dia_semana2'] == 1): ?>
                        Lunes
                    <?php elseif ($programa['dia_semana2'] == 2): ?>
                        Martes
                    <?php elseif ($programa['dia_semana2'] == 3): ?>
                        Miércoles
                    <?php elseif ($programa['dia_semana2'] == 4): ?>
                        Jueves
                    <?php elseif ($programa['dia_semana2'] == 5): ?>
                        Viernes
                    <?php else: ?>
                        Sábado
                    <?php endif; ?>
                    <p>
                        <?= $programa['hora_inicio2']; ?> -
                        <?= $programa['hora_fin2'] ?>
                    </p>

                </td>

                <td>
                    <a href="/programacion/edit/<?= $programa['id']; ?>">Editar</a>
                    <a href="<?= site_url("admin/programacion/eliminar-asignacion/{$programa['id']}"); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta asignación?')">Eliminar</a>

                    <form action="<?= site_url('coordinador/carrera-docente/eliminar-asignacion-horario'); ?>" method="post">
                        <input type="hidden" name="asignacion_id" value="<?= $asignacion['id']; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

        <tfoot>
        <th>ID</th>
        <th>ASIGNATURA</th>
        <th>DOCENTE</th>
        <th>CARRERA</th>
        <th>HORARIO</th>
        <th>Acciones</th>
        </tfoot>

    </table>

    
    <?= $this->endSection(); ?>