<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>



        <h2 class="mt-5">Nueva asignatura</h2>


        <div>
            <?= \Config\Services::validation()->listErrors(); ?>
        </div>


        <form class="mb-5" action="<?= base_url('admin/asignaturas'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Asignatura:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" required>
                    </div>
                </div>

                
            </div>

            <div class="row">

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="clave">Clave de la asignatura:</label>
                        <input class="form-control" type="text" id="clave" name="clave" min="0" max="100">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="creditos">Créditos:</label>
                        <input class="form-control" type="number" id="creditos" name="creditos" min="0" max="100">
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="descripcion">Descripción:</label>
                        <input class="form-control" type="text" id="descripcion" name="descripcion">
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

    

<?= $this->endSection(); ?>
