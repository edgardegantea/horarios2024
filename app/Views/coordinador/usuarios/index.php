<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>


    <!-- HACER QUE EL COORDINADOR SOLO VEA A LOS DOCENTES QUE SON DE SU CARRERA -->
    
    <h2>Usuarios registrados en el sistema</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('coordinador/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('coordinador/usuarios/new'); ?>">Nuevo</a>    
    </div>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
               <th>Nombre del usuario</th>
                <th>Tipo de usuario</th>
                <th>Username</th>
                <th>Correo electrónico</th>
                <th>Sexo</th>
                <th>Acciones</th> 
            </tr>
            
        </thead>
        <tbody>
            
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['nombre'] . ' ' . $usuario['apaterno'] . ' ' . $usuario['amaterno'] ?></td>
                    <td>
                        <?php if($usuario['rol'] == 'admin'): ?>
                            Administrador
                        <?php elseif($usuario['rol'] == 'coordinador'): ?>
                            Coordinador
                        <?php elseif($usuario['rol'] == 'docente'): ?>
                            Docente
                        <?php else: ?>
                            Alumno
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
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('coordinador/usuarios/'.$usuario['id'].'/edit'); ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <tr>
               <th>Nombre del usuario</th>
                <th>Tipo de usuario</th>
                <th>Username</th>
                <th>Correo electrónico</th>
                <th>Sexo</th>
                <th>Acciones</th> 
            </tr>
            
        </tfoot>
    </table>

	
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>


<script>
    function deleteUsuario(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>

