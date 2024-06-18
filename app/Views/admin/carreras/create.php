<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <div class="">
        <h2 class="mt-5">Registrar carrera</h2>


        <form class="mb-5" action="<?= base_url('admin/carreras'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="row">
                <div class="form-group">
                    <label for="">Seleccione al coordinador:</label>
                    <select name="coordinador" class="form-control" id="">
                        <?php foreach ($coordinadores as $coordinador): ?>
                            <option value="<?= $coordinador['id'] ?>"><?= $coordinador['nombre'] .' '. $coordinador['apaterno'] .' '. $coordinador['amaterno'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Carrera:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" required>
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label for=""></label>
                        <select name="tipo" id="">
                            <option value="carrera">Carrera</option>
                            <option value="curso">Curso</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label" for="descripcion">Información adicional:</label>
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



    <?= $this->endSection() ?>