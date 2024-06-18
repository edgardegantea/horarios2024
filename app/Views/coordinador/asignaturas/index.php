<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>

<article>
    <div>
        <a href="<?= site_url('coordinador/asignaturas/new') ?>" class="btn btn-primary">Agregar asignatura</a>
    </div>
</article>



<div class="">
    <table class="table">
        <thead>
            <thead>
                <th>Asignatura</th>
                <th>Créditos</th>
                <th>Acciones</th>
            </thead>
        </thead>

        <tbody>
            <?php foreach($asignaturas as $asignatura) : ?>
                <tr>
                    <td><?= $asignatura['nombre'] ?></td>
                    <td><?= $asignatura['creditos'] ?></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?= $this->endSection(); ?>