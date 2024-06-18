<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <div class="">
        <h2 class="mt-5">Editar información de carrera</h2>


        <form method="post" action="<?= site_url('admin/carreras/' . $carrera['id']) ?>">

            <input type="hidden" name="_method" value="PUT">
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $carrera['nombre'] ?>" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input class="form-control" type="text" name="" id="" value="<?= $carrera['descripcion'] ?>">
            </div>
            
            
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Guardar">
            </div>
        
        </form>
        

    </div>

    <?= $this->endSection() ?>