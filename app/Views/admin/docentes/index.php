<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    
    <h2>Docentes registrados en el sistema</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('admin/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('admin/usuarios/new'); ?>">Nuevo</a>    
    </div>

    <table id="example" class="table table-striped table-justify">
        <thead>
            <th>Nombre del usuario</th>
            <th>Formación profesional</th>
            <th>Tipo de usuario</th>
            <th>Status</th>
            <th>Username</th>
            <th>Correo electrónico</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            
            <?php foreach($usuariosDocentes as $usuario): ?>
                <tr>
                    <td><span class="text-uppercase"><?= $usuario['nombre'] . ' ' . $usuario['apaterno'] . ' ' . $usuario['amaterno'] ?></span></td>
                    <td>
                        <?php if($usuario['licenciatura']): ?>
                            <p>Licenciatura: <?= $usuario['licenciatura'] ?></p>
                        <?php endif; ?>
                        <?php if($usuario['maestria']): ?>
                            <p>Maestría: <?= $usuario['maestria'] ?></p>
                        <?php endif; ?>
                        <?php if($usuario['doctorado']): ?>
                            <p>Doctorado: <?= $usuario['doctorado'] ?></p>
                        <?php endif; ?>
                        
                    </td>
                    <td>
                        <?php if ($usuario['estatusDD'] != null): ?>
                            <?= $usuario['estatusDD'] ?><br>
                            <?= $usuario['condicion'] . ' con ' . $usuario['numHoras'] . ' horas' ?>
                        <?php else: ?>
                            Definir estatus
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($usuario['rol'] == 'docente'): ?>
                            Docente
                        <?php endif; ?>
                    </td>
                    <td><?= $usuario['username']; ?></td>
                    <td><?= $usuario['email']; ?></td>
                    <!--
                    <td>
                        <?php if($usuario['sexo'] == 'f'): ?>
                            Mujer
                        <?php else: ?>
                            Hombre
                        <?php endif; ?>
                    </td>
                    -->

                    <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="<?= base_url('admin/usuarios/id/' . $usuario['id']) ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-eye"></i></a>
                        <a href="<?= base_url('admin/usuarios/'.$usuario['id'].'/edit'); ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                        <form class="display-none" method="post" action="<?= base_url('admin/usuarios/'.$usuario['id']); ?>" id="usuarioDeleteForm<?=$usuario['id']?>">
                            <input type="hidden" name="_method" value="DELETE"/>
                            <a href="javascript:void(0)" onclick="deleteUsuario('usuarioDeleteForm<?=$usuario['id']; ?>')" class="btn btn-sm btn-danger" title="Eliminar registro"><i class="fas fa-trash"></i></a>
                        </form>
                        </div>
                        
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
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