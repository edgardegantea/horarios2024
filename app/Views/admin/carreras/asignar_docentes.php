<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">



    <h2>Asignar Docentes a <?= $carrera['nombre']; ?></h2>


        <form method="post" action="<?= site_url('admin/carreras/guardarAsignacion') ?>">

        <div>
        <label for="docentes">Seleccionar Docentes:</label>
        <div class="row">
        <?php foreach ($docentes as $docente): ?>
            <div class="col-md-4">

                    <input type="checkbox" name="docentes[]" value="<?= $docente['id']; ?>">
                    <span class="text-uppercase"><?= $docente['nombre'] . ' ' . $docente['apaterno'] . ' ' . $docente['amaterno']; ?></span>

        </div>
        <?php endforeach; ?>
        </div>
        </div>

        <input type="hidden" name="carrera_id" value="<?= $carrera['id']; ?>">

        <button class="btn btn-primary" type="submit">Guardar Asignación</button>

    </form>

<?= $this->endSection() ?>