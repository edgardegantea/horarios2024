<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">



<div class="container">

	<header class="mt-5">
		<h3>Formulario de registro de nuevo docente</h3>
	</header>


	<form method="post" action="<?= site_url('/admin/docentes/store'); ?>">
		<?= csrf_field(); ?>

		<div class="form-group">
			<label>Nombre de usuario:</label>
			<input type="text" name="usuario" class="form-control">
		</div>

		<div class="form-group">
			<label>Contraseña:</label>
			<input type="password" name="password" class="form-control">
		</div>

		
		<div class="form-group">
			<label>Asignar horas:</label>
			<input max="40" min="0" type="number" name="horas_asignadas" class="form-control">
		</div>

		<div class="form-group">
			<label>Estatus del docente:</label>
			<select name="estatus" class="form-select">
				<option disabled selected>Seleccione un estatus</option>
				<?php foreach($estatusDelPersonal as $edpersonal): ?>
					<option value="<?= $edpersonal['id'] ?>"><?= $edpersonal['nombre'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>


		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<input class="btn btn-primary mt-5" type="submit" name="" value="Guardar">
		</div>

	</form>
</div>