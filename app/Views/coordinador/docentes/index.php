<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>


    
    <h2>Docentes registrados en el sistema</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('coordinador/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('coordinador/usuarios/new'); ?>">Nuevo</a>    
    </div>

    <table id="example" class="table table-striped table-justify">
        <thead>
            <th>Nombre del usuario</th>
            <th>Tipo de usuario</th>
            <th>Username</th>
            <th>Correo electrónico</th>
            <th>Sexo</th>
        </thead>
        <tbody>
            
            <?php foreach($usuariosDocentes as $usuario): ?>
                <tr>
                    <td><?= $usuario['profesor'] ?></td>
                    <td>
                        <?php if($usuario['rol'] == 'docente'): ?>
                            Docente
                        <?php endif; ?>
                    </td>
                    <td><?= $usuario['username']; ?></td>
                    <td><?= $usuario['email']; ?></td>
                    <td>
                        <?php if($usuario['sexo'] == 'f'): ?>
                            Mujer
                        <?php else: ?>
                            Hombre
                        <?php endif; ?>
                    </td>

                </tr>
            <?php endforeach; ?>

        </tbody>

        <tfoot>
        <th>Nombre del usuario</th>
        <th>Tipo de usuario</th>
        <th>Username</th>
        <th>Correo electrónico</th>
        <th>Sexo</th>
        </tfoot>

    </table>




<script>
    function deleteUsuario(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>