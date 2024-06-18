    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">


<div class="container mt-5">
    
    <h2>Docentes</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2" href="<?= site_url('admin/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('admin/docentes/create'); ?>">Nuevo</a>    
    </div>

    <table class="table table-striped table-justify">
		<thead>
			<th>USUARIO</th>
			<th>DOCENTE</th>
			<th>FORMACIÓN</th>
			<th>ADSCRITO A</th>
			<th>HORAS ASIGNADAS</th>
			<th>ESTATUS</th>
			<th>ACCIONES</th>
		</thead>
		<tbody>
			<?php foreach($docentes as $docente): ?>
			<tr>
				<td><?= $docente['usuario'] ?></td>
				<td><?= $docente['nombre'] . ' ' . $docente['aPaterno'] . ' ' . $docente['aMaterno'] ?></td>
				<td><?= $docente['licenciatura'] ?></td>

				<td><?= $docente['licenciatura'] ?></td>

				<td>
					<?= $docente['horas_asignadas'] ?>
				</td>

				<td>
					<?= $docente['estatus'] ?>
					<!--
					<?php if ($docente['horas_asignadas'] < 13): ?>
						Docente de asignatura
					<?php elseif ($docente['horas_asignadas'] < 40): ?>
						Docente de medio tiempo
					<?php else: ?>
						Docente de tiempo completo
					<?php endif; ?>
				-->
				</td>

				<td>
                        
                        <form class="display-none" method="post" action="<?= base_url('admin/docentes/'.$docente['id']); ?>" id="docenteDeleteForm<?=$docente['id']?>">
                            <input type="hidden" name="_method" value="DELETE"/>
                            <a href="javascript:void(0)" onclick="deleteDocente('docenteDeleteForm<?=$docente['id']; ?>')" class="btn btn-sm btn-danger" title="Eliminar registro">Eliminar</a>
                        </form>

                        <!-- <span class="fas fa-trash"></span> -->
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</div>



<script>
    function deleteDocente|(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>
