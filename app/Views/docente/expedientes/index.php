<?= $this->extend('template/bodyDocente') ?>
<?= $this->section('content') ?>

<h2>Mi expediente académico</h2>

<?php if (empty($expediente)): ?>
    <p class="lead mb-3">No hay información disponible</p>
    Haga clic en <a class="btn btn-outline-primary" href="/docente/expediente/create">actualizar información de mi expediente</a> para recabar su información académica.
<?php else: ?>
    <?php $this->session = \Config\Services::session(); ?>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-outline-primary" href="<?= site_url('docente/expediente/edit/'.$this->session->id) ?>">Editar o corregir información de mi expediente académico</a>
    </div>
<?php endif; ?>






<div class="lead text-justify">

    <article class="mb-5 mt-5">
        <?php foreach ($expediente as $e) : ?>
            <h4>Acerca de mí:</h4>
            <tr>
                <td colspan="2"><?= $e['bio'] ?></td>
            </tr> 
        <?php endforeach; ?>
    </article>

    <!-- <article class="mb-5">
        <table>
        <?php foreach ($expediente as $e) : ?>
            <h4>Grados académicos</h4>
            <tr>
                <td></td><td><?= $e['fecha_titulacion_lic'] ?>  -  </td>
                <td></td><td><?= $e['licenciatura'] ?></td>

            </tr>

            <?php if(!empty($e['maestria'])): ?>
            <tr>
                <td>Fecha de titulación:</td><td><?= $e['fecha_titulacion_mae'] ?>  -  </td>
                <td>Maestría:</td><td><?= $e['maestria'] ?></td>
            </tr>
            <?php endif; ?>

            <?php if(!empty($e['doctorado'])): ?>
            <tr>
                <td>Fecha de titulación:</td><td><?= $e['fecha_titulacion_doc'] ?>  -  </td>
                <td>Doctorado:</td><td><?= $e['doctorado'] ?></td>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </table>
    </article> -->


    <article class="mb-5">
        <table class="table">
            <tr class="">
                <th>Grado académico</th>
                <th>Cédula profesional</th>
                <th>Fecha de titulación</th>
            </tr>
        <?php foreach ($expediente as $e) : ?>
            <h4>Grados académicos:</h4>
                
            <tr>
                <td><?= $e['licenciatura'] ?></td>
                <td>
                    <?php if (!empty($e['lic_num_cedula'])): ?>
                        <?= $e['lic_num_cedula'] ?>
                    <?php else: ?>
                        Sin especificar
                    <?php endif; ?>
                    
                </td>
                <td><?= $e['fecha_titulacion_lic'] ?></td>
            </tr>

            <?php if(!empty($e['maestria'])): ?>
            <tr>
                <td><?= $e['maestria'] ?></td>
                <td>
                    <?php if (!empty($e['mae_num_cedula'])): ?>
                        <?= $e['mae_num_cedula'] ?>
                    <?php else: ?>
                        Sin especificar
                    <?php endif; ?>
                </td>
                <td><?= $e['fecha_titulacion_mae'] ?></td>
            </tr>
            <?php endif; ?>


            <?php if(!empty($e['doctorado'])): ?>
            <tr>
                <td><?= $e['doctorado'] ?></td>
                <td>
                    <?php if (!empty($e['doc_num_cedula'])): ?>
                        <?= $e['doc_num_cedula'] ?>
                    <?php else: ?>
                        Sin especificar
                    <?php endif; ?>
                </td>
                <td><?= $e['fecha_titulacion_doc'] ?></td>
            </tr>
            <?php endif; ?>

        <?php endforeach; ?>
        </table>
    </article>


    <article class="mb-5">
        <table class="table">
        <?php foreach ($expediente as $e) : ?>
            <h4>Artículos (Autor o coautor):</h4>
            <tr>
                <td>
                <?php if (!empty($e['articulo1'])): ?>
                    <span class="text-muted"><?= $e['fecha_pub_articulo1'] ?>:</span> <?= $e['articulo1'] ?>
                <?php endif; ?>    
                </td>
            </tr>
            <tr>
            <td>
                <?php if (!empty($e['articulo2'])): ?>
                    <span class="text-muted"><?= $e['fecha_pub_articulo2'] ?>:</span> <?= $e['articulo2'] ?>
                <?php endif; ?>
                
            </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </article>

    <article class="mb-5">
        <table class="table">
        <?php foreach ($expediente as $e) : ?>
            <h4>Experiencia adicional:</h4>
            <tr>
                <td>
                <?php if (!empty($e['experiencia_adicional'])): ?>
                    <?= $e['experiencia_adicional'] ?>
                <?php endif; ?>    
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </article>



    </div>

<?= $this->endSection() ?>
