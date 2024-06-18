<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


<div class="">
    <table class="table">
        <thead>
            <thead>
                <th>Asignatura</th>
                <th>Docente</th>
                <th>Horarios</th>
            </thead>
        </thead>

        <tbody>
            <tr>
                <td>
                    <select class="form-control" name="materia_id" required>
                        <?php foreach ($asignaturas as $asignatura) : ?>
                            <option value="<?= $asignatura['id']; ?>"><?= $asignatura['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="docente_id" required>
                        <?php foreach ($docentes as $docente) : ?>
                            <option value="<?= $docente['id']; ?>"><?= $docente['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>



<?= $this->endSection(); ?>