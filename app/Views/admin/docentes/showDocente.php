<?= $this->extend('template/body') ?>
<?= $this->section('content') ?>

<h2>Información del docente <?= $usuario['nombre'] . ' ' . $usuario['apaterno'] . ' ' . $usuario['amaterno'] ?></h2>






<div class="lead text-justify">

    <article class="mb-5 mt-5">
        
            <h4>Acerca de <?= $usuario['nombre'] ?>:</h4>
            <tr>
                <td colspan="2"><?= $usuario['bio'] ?></td>
            </tr> 

    </article>




    <article class="mb-5">

        <h2>Formación académica</h2>

        <table class="table">
            <tr class="">
                <th>Grado académico</th>
                <th>Cédula profesional</th>
                <th>Fecha de titulación</th>
            </tr>


                
            <tr>
                <td><?= $usuario['licenciatura'] ?></td>
                <td>
                    <?php if (!empty($usuario['lic_num_cedula'])): ?>
                        <?= $usuario['lic_num_cedula'] ?>
                    <?php else: ?>
                        Sin especificar
                    <?php endif; ?>
                    
                </td>
                <td><?= $usuario['fecha_titulacion_lic'] ?></td>
            </tr>

            <?php if(!empty($usuario['maestria'])): ?>
            <tr>
                <td><?= $usuario['maestria'] ?></td>
                <td>
                    <?php if (!empty($usuario['mae_num_cedula'])): ?>
                        <?= $usuario['mae_num_cedula'] ?>
                    <?php else: ?>
                        Sin especificar
                    <?php endif; ?>
                </td>
                <td><?= $usuario['fecha_titulacion_mae'] ?></td>
            </tr>
            <?php endif; ?>


            <?php if(!empty($usuario['doctorado'])): ?>
            <tr>
                <td><?= $usuario['doctorado'] ?></td>
                <td>
                    <?php if (!empty($usuario['doc_num_cedula'])): ?>
                        <?= $usuario['doc_num_cedula'] ?>
                    <?php else: ?>
                        Sin especificar
                    <?php endif; ?>
                </td>
                <td><?= $usuario['fecha_titulacion_doc'] ?></td>
            </tr>
            <?php endif; ?>


        </table>
    </article>


    <article class="mb-5">
        <table class="table">

            <h4>Artículos (Autor o coautor):</h4>
            <tr>
                <td>
                <?php if (!empty($usuario['articulo1'])): ?>
                    <span class="text-muted"><?= $usuario['fecha_pub_articulo1'] ?>:</span> <?= $usuario['articulo1'] ?>
                <?php endif; ?>    
                </td>
            </tr>
            <tr>
            <td>
                <?php if (!empty($usuario['articulo2'])): ?>
                    <span class="text-muted"><?= $usuario['fecha_pub_articulo2'] ?>:</span> <?= $usuario['articulo2'] ?>
                <?php endif; ?>
                
            </td>
            </tr>

        </table>
    </article>

    <article class="mb-5">
        <table class="table">

            <h4>Experiencia adicional:</h4>
            <tr>
                <td>
                <?php if (!empty($usuario['experiencia_adicional'])): ?>
                    <?= $usuario['experiencia_adicional'] ?>
                <?php endif; ?>    
                </td>
            </tr>

        </table>
    </article>



    </div>

<?= $this->endSection() ?>
