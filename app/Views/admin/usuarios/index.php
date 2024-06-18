<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">


    
    <h2>Usuarios registrados en el sistema</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('admin/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('admin/usuarios/new'); ?>">Nuevo usuario</a>
        <a class="btn btn-primary ml-1" href="<?= site_url('admin/usuarios/crearCoordinador'); ?>">Registrar COORDINADOR</a>
    </div>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
               <th>Nombre del usuario</th>
                <th>Tipo de usuario</th>
                <th>Username</th>
                <th>Correo electrónico</th>
                <!-- <th>Sexo</th> -->
                <th>Acciones</th> 
            </tr>
            
        </thead>
        <tbody>
            
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><span class="text-uppercase"><?= $usuario['nombre'] . ' ' . $usuario['apaterno'] . ' ' . $usuario['amaterno'] ?></span></td>
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
                    <!-- <td>
                        <?php if($usuario['sexo'] == 'f'): ?>
                            Mujer
                        <?php else: ?>
                            Hombre
                        <?php endif; ?>
                    </td> -->
                    <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="<?= base_url('admin/usuarios/'.$usuario['id'].'/edit'); ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                        <form method="post" action="<?= base_url('admin/usuarios/'.$usuario['id']); ?>" id="usuarioDeleteForm<?=$usuario['id']?>">
                            <input type="hidden" name="_method" value="DELETE"/>
                            <a href="javascript:void(0)" onclick="deleteUsuario('usuarioDeleteForm<?=$usuario['id']; ?>')" class="btn btn-sm btn-danger mr-1" title="Eliminar registro"><i class="fas fa-trash"></i></a>
                        </form>
                        <a href="<?php echo base_url('admin/usuarios/edit_password/' . $usuario['id']); ?>" class="btn bt-sm btn-default mr-1"><i class="fas fa-key"></i></a>
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
                <!-- <th>Sexo</th> -->
                <th>Acciones</th> 
            </tr>
            
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

