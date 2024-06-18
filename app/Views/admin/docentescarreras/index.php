<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">


    
    <h2>Usuarios registrados en el sistema</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('admin/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('admin/usuarios/new'); ?>">Nuevo</a>    
    </div>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Carrera</th>
                <th>Número de docentes adscritos</th>
                <th>Acciones</th> 
            </tr>
            
        </thead>
        <tbody>
            
            <?php foreach($carreras as $carrera): ?>
                <tr>
                    <td><?= $carrera['nombre']; ?></td>
                    <td></td>
                    
                    <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <td>
                        <!-- Enlace para ver docentes adscritos -->
                        <a href="<?= base_url('carrera/ver_docentes/' . $carrera['id']); ?>">Ver Docentes</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Nombre del usuario</th>
                <th>Número de docentes adscritos</th>
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