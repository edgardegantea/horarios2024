<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>

<div class="">
    
    <h2>Periodos escolares</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('coordinador/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('coordinador/pescolares/new'); ?>">Nuevo</a>    
    </div>

    <table class="table table-striped table-justify">
        <thead>
            <th>Periodo escolar</th>
            <th>Fecha de inicio</th>
            <th>Fecha de finalización</th>
        </thead>
        <tbody>
            
            <?php foreach($periodos_escolares as $pe): ?>
                <tr>
                    <td><?= $pe['nombre']; ?></td>
                    <td><?= $pe['fecha_inicio']; ?></td>
                    <td><?= $pe['fecha_fin'] ?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('coordinador/pescolares/'.$pe['id'].'/edit'); ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                            <form class="display-none" method="post" action="<?= base_url('coordinador/pescolares/'.$pe['id']); ?>" id="peDeleteForm<?=$pe['id']?>">
                                <input type="hidden" name="_method" value="DELETE"/>
                                <a href="javascript:void(0)" onclick="deletePE('peDeleteForm<?=$pe['id']; ?>')" class="btn btn-sm btn-danger" title="Eliminar registro"><i class="fas fa-trash"></i></a>
                            </form>
                        </div>
                        
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</div>



<script>
    function deletePE(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection() ?>