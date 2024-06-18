<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>



<h2 class="mt-5">Crear Usuario</h2>


<div>
    <?= \Config\Services::validation()->listErrors(); ?>
</div>


<form class="mb-5" action="<?= base_url('admin/usuarios'); ?>" method="post">
    <?= csrf_field(); ?>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label" for="apaterno">Apellido Paterno:</label>
                <input class="form-control" type="text" id="apaterno" name="apaterno" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label" for="amaterno">Apellido Materno:</label>
                <input class="form-control" type="text" id="amaterno" name="amaterno">
            </div>
        </div>
    </div>

    <div class="row mb-3">

        <input type="hidden" name="rol" value="coordinador">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label" for="rol">Asignar carrera:</label>
                <select class="form-control" name="carrera" id="" required>
                    <?php foreach ($carreras as $carrera): ?>
                        <option value="<?= $carrera['id'] ?>"><?= $carrera['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label" for="username">Nombre de Usuario:</label>
                <input class="form-control" type="text" id="username" name="username" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label" for="email">Correo Electrónico:</label>
                <input class="form-control" type="email" id="email" name="email" required>
            </div>
        </div>

    </div>


    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label" for="password">Contraseña:</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <label class="form-label" for="sexo">Sexo:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="sexo" name="sexo" value="f" required> Femenino
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="sexo" name="sexo" value="m" required> Masculino
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label" for="fechaNacimiento">Fecha de Nacimiento:</label>
                <input class="form-control" type="date" id="fechaNacimiento" name="fechaNacimiento" required>
            </div>
        </div>
    </div>


    <div class="row mb-3 mt-5">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="submit">Registrar</button>
        </div>
    </div>

</form>
</div>



<?= $this->endSection(); ?>
