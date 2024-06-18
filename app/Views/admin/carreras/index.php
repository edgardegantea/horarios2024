<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

<?php $this->docentesCarrerasModel = new \App\Models\DocentesCarrerasModel(); ?>
<?php $this->carrerasAsignaturasModel = new \App\Models\CarrerasAsignaturasModel(); ?>



<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<div class="">
    
    <h2>Carreras</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('admin/'); ?>">Regresar</a>
        <!-- <a class="btn btn-outline-danger" href="/admin/programacion/printAll" target="_blank">IMPRIMIR TODAS LAS ASIGNACIONES DE HORARIOS EN PDF</a> -->
    </div>

    <table id="example" class="table table-striped table-justify table-bordered">
        <thead>
            <th>COORDINADOR</th>
            <th>CARRERAS</th>
            <th>TIPO</th>
            <th>PDF</th>
            <th>HORARIOS</th>
            <th>DOCENTES</th>
            <th>ASIGNATURAS</th>
            <th>ACCIONES</th>
        </thead>
        <tbody>

            <?php foreach($carreras as $carrera): ?>
                <tr>
                    <td>
                        <?php if (!empty($carrera['coordinador'])) : ?>
                            <?= $carrera['coord'] ?>
                        <?php else: ?>
                            <span class="text-danger">Falta asignar coordinador</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $carrera['nombre']; ?></td>
                    <td><?= $carrera['tipo']; ?></td>
                    <td>
                    <!--
                        <form action="/admin/descargar_constancias/<?php echo $carrera['id']; ?>" method="post" target="_blank">
                            <button disabled class="btn btn-outline-danger" type="submit"><i class="fas fa-file-pdf"></i></button>
                        </form>
                    -->
                        <a class="btn btn-outline-danger" href="<?= site_url('admin/carreras/exportarPDF/' . $carrera['id']) ?>" target="_blank"><i class="fas fa-file-pdf"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-outline-primary" href="<?= site_url('admin/carreras/agregar_horario/' . $carrera['id']) ?>"><i class="fas fa-plus"></i></a>
                        <a class="btn btn-outline-info" href="<?= site_url('admin/carreras/asignaciones/' . $carrera['id']) ?>"><i class="fas fa-eye"></i></a>
                        <!-- <?= anchor("admin/carreras/agregar_horario/{$carrera['id']}", 'Agregar', 'class="btn btn-danger"'); ?> -->

                    </td>
                    <td class="left">
                        <a class="btn btn-outline-primary" href="<?= base_url('admin/carreras/asignarDocentes/'.$carrera['id']); ?>"><i class="fas fa-plus"></i></a>
                        <a class="btn btn-outline-info" href="<?= base_url('admin/carreras/vdxc/'.$carrera['id']); ?>"><span class="badge text-bg-secondary"><?= count($this->docentesCarrerasModel->where('carrera', $carrera['id'])->findAll()); ?></span></a>
                    </td>
                    <td>
                        <a class="btn btn-outline-primary" href="<?= base_url('admin/carreras/asignarAsignaturas/'.$carrera['id']); ?>"><i class="fas fa-plus"></i></a>
                        <a class="btn btn-outline-info" href="<?= base_url('admin/carreras/vaxc/'.$carrera['id']); ?>"><span class="badge text-bg-secondary"><?= count($this->carrerasAsignaturasModel->where('carrera', $carrera['id'])->findAll()); ?></span></a>
                    </td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('admin/carreras/'.$carrera['id'].'/edit'); ?>" class="btn btn-outline-dark me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                            <form class="display-none" method="post" action="<?= base_url('admin/carreras/'.$carrera['id']); ?>" id="carreraDeleteForm<?=$carrera['id']?>">
                                <input type="hidden" name="_method" value="DELETE"/>
                                <!-- <a readonly="true" href="javascript:void(0)" onclick="deleteCarrera('carreraDeleteForm<?=$carrera['id']; ?>')" class="btn btn-outline-danger" title="Eliminar registro"><i class="fas fa-trash"></i></a> -->
                            </form>

                        </div>
                        
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <th>COORDINADOR</th>
            <th>CARRERAS</th>
            <th>TIPO</th>
            <th>PDF</th>
            <th>HORARIOS</th>
            <th>DOCENTES</th>
            <th>ASIGNATURAS</th>
            <th>ACCIONES</th>
        </tfoot>
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