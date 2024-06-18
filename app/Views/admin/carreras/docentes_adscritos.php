<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <h2>Docentes adscritos a la Carrera</h2>

    <div>
        <table id="example" class="table table-striped table-justify">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($docentesxc as $docente): ?>
                <tr>
                    <td><?= $docente['id']; ?></td>
                    <td><span class="text-uppercase"><?= $docente['docente'] ?></span></td>
                    <td><a href="<?= base_url('admin/carreras/eliminarAsignacion/' . $docente['id']) ?>">Quitar</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<?= $this->endSection() ?>