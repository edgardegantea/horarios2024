<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <div class="">
        <h2 class="mt-5">Editar información de grupo</h2>


        <form method="post" action="<?= site_url('admin/grupos/' . $grupo['id']) ?>">

            <input type="hidden" name="_method" value="PUT">
            
            <div class="form-group">
                <label for="clave">Clave del grupo:</label>
                <input class="form-control" type="text" name="clave" id="clave" value="<?= $grupo['clave'] ?>" required>
            </div>


            <div class="form-group">
                <label for="nombre">Nombre del grupo:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $grupo['nombre'] ?>" required>
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Guardar">
            </div>
        
        </form>
        

    </div>

    <?= $this->endSection() ?>