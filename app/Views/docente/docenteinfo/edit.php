<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

<div class="">

	<header class="mt-5">
		<h3>Actualización de información del docente</h3>
	</header>


	<h4>Datos de residencia</h4>


	<form method="post" action="<?= site_url('/docente/docenteinfo/update/' . $docenteinfo['id']); ?>">
		<?= csrf_field(); ?>

		

		<div class="form-group">
			<label>Calle:</label>
			<input type="text" name="calle" class="form-control">
		</div>

		<div class="form-group">
			<label>Número interior:</label>
			<input type="text" name="numInterior" class="form-control">
		</div>

		<div class="form-group">
			<label>Municipio:</label>
			<input type="text" name="municipio" class="form-control">
		</div>

		

		<div class="form-group">
			<label>Estado de procedencia:</label>
			<input class="form-control" type="text" name="estado">
			
		</div>


		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<input class="btn btn-primary mt-5" type="submit" name="" value="Guardar">
		</div>

	</form>
</div>

<?= $this->endSection(); ?>