<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>

<div class="">
    
    <h2>Carreras</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('coordinador/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('coordinador/carreras/new'); ?>">Nuevo</a>    
    </div>

    <table class="table table-striped table-justify">
        <thead>
            <th>Carrera</th>
            <th>Información adicional</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            
            <?php foreach($carreras as $carrera): ?>
                <tr>
                    <td><?= $carrera['nombre']; ?></td>
                    <td><?= $carrera['descripcion']; ?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('coordinador/carreras/'.$carrera['id'].'/edit'); ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                            <form class="display-none" method="post" action="<?= base_url('coordinador/carreras/'.$carrera['id']); ?>" id="carreraDeleteForm<?=$carrera['id']?>">
                                <input type="hidden" name="_method" value="DELETE"/>
                                <a href="javascript:void(0)" onclick="deleteCarrera('carreraDeleteForm<?=$carrera['id']; ?>')" class="btn btn-sm btn-danger" title="Eliminar registro"><i class="fas fa-trash"></i></a>
                            </form>
                        </div>
                        
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</div>



<script>
    function deleteCarrera(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection() ?>