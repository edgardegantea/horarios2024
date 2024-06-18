<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

<div class="">


    <div class="">
        <div class="card-header">
            <h3 class="card-title">Actualizar contraseña</h3>
            <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-dark float-right">Regresar</a>
        </div>

        <form method="post" action="<?php echo base_url('admin/usuarios/update_password/' . $usuario['id']); ?>">
            <label>Nueva Contraseña:</label>
            <input type="password" name="new_password" required>

            <button type="submit">Actualizar Contraseña</button>
        </form>

    </div>


<?= $this->endsection(); ?>