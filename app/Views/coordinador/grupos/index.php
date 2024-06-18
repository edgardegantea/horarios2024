<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>

<div class="">
    
    <h2>Grupos</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button id="btnAbrirCrearModal" class="btn btn-primary">Crear grupo</button>



        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('coordinador/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('coordinador/grupos/new'); ?>">Nuevo</a>    
    </div>

    <table class="table table-striped table-justify">
        <thead>
            <th>Algo</th>
            <th>Clave</th>
            <th>Grupo</th>
            <th>Información adicional</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            
            <?php foreach($grupos as $grupo): ?>
                <tr>
                    <td>
                    <button id="btnAbrirEditarModal" class="btn btn-warning"><?= $grupo['clave'] ?></button>
                    </td>
                    <td><?= $grupo['clave'] ?></td>
                    <td><?= $grupo['nombre']; ?></td>
                    <td><?= $grupo['created_at']; ?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-warning" onclick="btnAbrirEditarModal(<?= $grupo['id'] ?>)">Editar</button>
                            <!-- <button class="btn btn-warning" onclick="abrirModalEditar(<?= $grupo['id'] ?>)">Editar</button> -->
                            <a href="<?= base_url('coordinador/grupos/'.$grupo['id'].'/edit'); ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                            <form class="display-none" method="post" action="<?= base_url('coordinador/grupos/'.$grupo['id']); ?>" id="grupoDeleteForm<?=$grupo['id']?>">
                                <input type="hidden" name="_method" value="DELETE"/>
                                <a href="javascript:void(0)" onclick="deleteGrupo('grupoDeleteForm<?=$grupo['id']; ?>')" class="btn btn-sm btn-danger" title="Eliminar registro"><i class="fas fa-trash"></i></a>
                            </form>
                        </div>
                        
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</div>



<!-- Modal de creación -->
<div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del modal de creación -->
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="<?= base_url('admin/grupos'); ?>" method="post">
                    <?= csrf_field(); ?>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="clave">Clave del grupo:</label>
                                <input class="form-control" type="text" id="clave" name="clave" required>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="nombre">Nombre del grupo:</label>
                                <input class="form-control" type="text" id="nombre" name="nombre" required>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>





<!-- app/Views/productos/editar_modal.php -->
<div class="modal fade" id="editarModal" tabindex="" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               

                <form method="post" action="<?= site_url('admin/grupos/' . $grupo['id']) ?>">

                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="clave">Clave del grupo:</label>
                        <input class="form-control" type="text" name="clave" id="clave" value="<?= $grupo['clave'] ?>" required>
                    </div>


                    <div class="form-group">
                        <label for="nombre">Nombre del grupo:</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $grupo['nombre'] ?>" required>
                    </div>

                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </form>
        </div>
    </div>
</div>




<script>
    function deleteGrupo(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>

<script>
document.getElementById("btnAbrirCrearModal").addEventListener("click", function() {
    // Mostrar el modal de creación al hacer clic en el botón
    $('#crearModal').modal('show');
});
</script>


<script>
document.getElementById("btnAbrirEditarModal").addEventListener("click", function() {
    // Mostrar el modal de edición al hacer clic en el botón
    $('#editarModal').modal('show');
});
</script>


<?= $this->endSection() ?>