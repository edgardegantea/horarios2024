<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">



    <h2>Agregar Asignaturas a <?= $carrera['nombre']; ?></h2>


    <form method="post" action="<?= site_url('admin/carreras/guardarAsignacionAsignaturas') ?>">

        <div>
            <label for="docentes">Seleccionar asignaturas para agregarlas a la carrera:</label>
            <div class="row">
                <?php foreach ($asignaturas as $asignatura): ?>
                    <div class="col-md-4">

                        <input type="checkbox" name="asignaturas[]" value="<?= $asignatura['id']; ?>">
                        <span class="text-uppercase"><?= $asignatura['nombre']; ?></span>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <input type="hidden" name="carrera_id" value="<?= $carrera['id']; ?>">

        <button class="btn btn-primary" type="submit">Guardar Asignación</button>

    </form>

<?= $this->endSection() ?>