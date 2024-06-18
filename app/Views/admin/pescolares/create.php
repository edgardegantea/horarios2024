<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <div class="">
        <h2 class="mt-5">Registrar periodo escolar</h2>


        <form class="mb-5" action="<?= base_url('admin/pescolares'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Periodo escolar:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" minlength="4" maxlength="30" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="fecha_inicio">Fecha de inicio:</label>
                        <input class="form-control" type="date" id="fecha_inicio" name="fecha_inicio">
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="fecha_fin">Fecha de finalización:</label>
                        <input class="form-control" type="date" id="fecha_fin" name="fecha_fin">
                    </div>
                </div>
            </div>




            <div class="row mb-3 mt-5">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </div>
            </div>
            
        </form>
    </div>



    <?= $this->endSection() ?>