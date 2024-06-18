<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>

    <div class="">
        <h2 class="mt-5">Editar información del periodo escolar</h2>


        <form method="post" action="<?= site_url('coordinador/pescolares/' . $pe['id']) ?>">

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $pe['id'] ?>">
            
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Periodo escolar:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" minlength="4" maxlength="30" required value="<?= $pe['nombre'] ?>">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="fecha_inicio">Fecha de inicio:</label>
                        <input class="form-control" type="date" id="fecha_inicio" name="fecha_inicio" value="<?= $pe['fecha_inicio'] ?>">
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="fecha_fin">Fecha de finalización:</label>
                        <input class="form-control" type="date" id="fecha_fin" name="fecha_fin" value="<?= $pe['fecha_fin'] ?>">
                    </div>
                </div>
            </div>




            <div class="row mb-3 mt-5">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Guardar cambios</button>
                </div>
            </div>
        
        </form>
        

    </div>

    <?= $this->endSection() ?>