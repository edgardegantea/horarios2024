<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>

<div class="">
    
    <h2>Periodos escolares</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('admin/coordinador'); ?>">Regresar</a>
    </div>

    <table class="table table-striped table-justify">
        <thead>
            <th>Nombre</th>
            <th>Licenciatura</th>
            <th>Maestría</th>
        </thead>
        <tbody>
            
            <?php foreach($idd as $info): ?>
                <tr>
                    <td><?= $info['nombre']; ?></td>
                    <td><?= $info['licenciatura']; ?></td>
                    <td><?= $info['maestria'] ?></td>
                    <td>
                        
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