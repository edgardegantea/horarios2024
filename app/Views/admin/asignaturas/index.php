<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">


    <h2>Asignaturas</h2>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('admin/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('admin/asignaturas/new'); ?>">Nuevo</a>    
    </div>


<div>
    <?php if (isset($mensaje)): ?>
        <div>
            <p class="text-danger"><?php echo $mensaje; ?></p>
        </div>
    <?php endif; ?>
</div>


<div class="">
    <table id="example" class="table table-striped table-justify">
        <thead>
            <th>Clave</th>
            <th>Asignatura</th>
            <th>Créditos</th>
            <th>Acciones</th>
        </thead>

        <tbody>
            <?php foreach($asignaturas as $asignatura) : ?>
                <tr>
                    <td><?= $asignatura['clave'] ?></td>
                    <td><?= $asignatura['nombre'] ?></td>
                    <td><?= $asignatura['creditos'] ?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('admin/asignaturas/'.$asignatura['id'].'/edit'); ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                            <form class="display-none" method="post" action="<?= base_url('admin/asignaturas/'.$asignatura['id']); ?>" id="asignaturaDeleteForm<?=$asignatura['id']?>">
                                <input type="hidden" name="_method" value="DELETE"/>
                                <a href="javascript:void(0)" onclick="deleteAsignatura('asignaturaDeleteForm<?=$asignatura['id']; ?>')" class="btn btn-sm btn-danger" title="Eliminar registro"><i class="fas fa-trash"></i></a>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <th>Clave</th>
            <th>Asignatura</th>
            <th>Créditos</th>
            <th>Acciones</th>
        </tfoot>
    </table>
</div>



<script>
    function deleteAsignatura(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>

<?= $this->endSection(); ?>