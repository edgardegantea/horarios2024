<!-- app/Views/expedientes/create.php -->

<?= $this->extend('template/bodyDocente') ?>
<?= $this->section('content') ?>

<h2>Actualizar mi información para expediente académico</h2>

<div>
    <?php if (isset($errors)) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
</div>



<form action="<?php echo base_url('docente/expediente/update/' . $expediente['docente']) ?>" method="post" enctype="multipart/form-data">

    <?= csrf_field() ?>


    <?php $this->session = \Config\Services::session(); ?>
    <input type="hidden" name="docente" value="<?php $this->session->id ?>">


    <div class="form-group">
        <label for="bio">Cuéntanos sobre tí:</label>
        <textarea name="bio" class="form-control" rows="5"><?= $expediente['bio'] ?></textarea>
    </div>
    <hr>

    <article class="mt-5 mb-3">
        <h2>Formación académica</h2>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="licenciatura">Licenciatura:</label>
                <input type="text" name="licenciatura" class="form-control" value="<?= $expediente['licenciatura'] ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="lic_num_cedula">Número de cédula profesional:</label>
                <input type="text" name="lic_num_cedula" class="form-control" value="<?= $expediente['lic_num_cedula'] ?>">
            </div>

<!--             <div class="form-group col-md-3">
                <label for="licenciatura_cedula">Cédula de Licenciatura (PDF o imagen):</label>
                <input type="file" name="licenciatura_cedula" accept=".pdf, image/*" value="<?= $expediente['licenciatura_cedula'] ?>">
            </div> -->

            <div class="form-group col-md-3">
                <label for="fecha_titulacion_lic">Fecha de Titulación de Licenciatura:</label>
                <input type="date" name="fecha_titulacion_lic" class="form-control" value="<?= $expediente['fecha_titulacion_lic'] ?>">
            </div>
        </div>
    
    

        <hr>    



        <div class="row">
            <div class="form-group col-md-6">
                <label for="maestria">Maestría:</label>
                <input type="text" name="maestria" class="form-control" value="<?= $expediente['maestria'] ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="mae_num_cedula">Número de cédula profesional:</label>
                <input type="text" name="mae_num_cedula" class="form-control" value="<?= $expediente['mae_num_cedula'] ?>">
            </div>

<!--             <div class="form-group col-md-3">
                <label for="maestria_cedula">Cédula de Maestría (PDF o imagen):</label>
                <input class="" type="file" name="maestria_cedula" accept=".pdf, image/*" value="<?= $expediente['maestria_cedula'] ?>">
            </div> -->

            <div class="form-group col-md-3">
                <label for="fecha_titulacion_mae">Fecha de Titulación de Maestría:</label>
                <input type="date" name="fecha_titulacion_mae" class="form-control" value="<?= $expediente['fecha_titulacion_mae'] ?>">
            </div>
        </div>
        
        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="maestria">Doctorado:</label>
                <input type="text" name="doctorado" class="form-control" value="<?= $expediente['doctorado'] ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="doc_num_cedula">Número de cédula profesional:</label>
                <input type="text" name="doc_num_cedula" class="form-control" value="<?= $expediente['doc_num_cedula'] ?>">
            </div>


            <!-- <div class="form-group col-md-3">
                <label for="doctorado_cedula">Cédula de Maestría (PDF o imagen):</label>
                <input type="file" name="doctorado_cedula" accept=".pdf, image/*" value="<?= $expediente['doctorado_cedula'] ?>">
            </div> -->

            <div class="form-group col-md-3">
                <label for="fecha_titulacion_doc">Fecha de Titulación de Maestría:</label>
                <input type="date" name="fecha_titulacion_doc" class="form-control" value="<?= $expediente['fecha_titulacion_doc'] ?>">
            </div>
        </div>
    </article>
    <hr>



    <article class="mt-5 mb-3">
        <h2 class="">Propiedad autoral:</h2>
        
        <div class="row">
            <div class="form-group col-md-6">
                <label for="articulo1">Artículo 1:</label>
                <input type="text" name="articulo1" class="form-control" value="<?= $expediente['articulo1'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_articulo1">Evidencia del artículo (PDF o imagen):</label>
                <input type="file" name="evidencia_articulo1" accept=".pdf, image/*" value="<?= $expediente['evidencia_articulo1'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_pub_articulo1">Fecha de publicación del artículo:</label>
                <input type="date" name="fecha_pub_articulo1" class="form-control" value="<?= $expediente['fecha_pub_articulo1'] ?>">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="articulo2">Artículo 2:</label>
                <input type="text" name="articulo2" class="form-control" value="<?= $expediente['articulo2'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_articulo2">Evidencia del artículo (PDF o imagen):</label>
                <input type="file" name="evidencia_articulo2" accept=".pdf, image/*" value="<?= $expediente['evidencia_articulo2'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_pub_articulo2">Fecha de publicación del artículo:</label>
                <input type="date" name="fecha_pub_articulo2" class="form-control" value="<?= $expediente['fecha_pub_articulo2'] ?>">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="articulo3">Artículo 3</label>
                <input type="text" name="articulo3" class="form-control" value="<?= $expediente['articulo3'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_articulo3">Evidencia del artículo (PDF o imagen):</label>
                <input type="file" name="evidencia_articulo3" accept=".pdf, image/*" value="<?= $expediente['evidencia_articulo3'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_pub_articulo3">Fecha de publicación del artículo:</label>
                <input type="date" name="fecha_pub_articulo3" class="form-control" value="<?= $expediente['fecha_pub_articulo3'] ?>">
            </div>
        </div>
    </article>

    <hr>


    <article class="mt-5 mb-3">
        
    
        <h2 class="">Cursos de formación y/o actualización docente recibidos:</h2>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="curso1">Curso 1:</label>
                <input type="text" name="curso1" class="form-control" value="<?= $expediente['curso1'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_curso1">Evidencia conclusión y aprobación del curso (PDF o imagen):</label>
                <input type="file" name="evidencia_curso1" accept=".pdf, image/*" value="<?= $expediente['evidencia_curso1'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_curso1">Fecha de finalización del curso:</label>
                <input type="date" name="fecha_curso1" class="form-control" value="<?= $expediente['fecha_curso1'] ?>">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="curso2">Curso 2:</label>
                <input type="text" name="curso2" class="form-control" value="<?= $expediente['curso2'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_curso2">Evidencia conclusión y aprobación del curso (PDF o imagen):</label>
                <input type="file" name="evidencia_curso2" accept=".pdf, image/*" value="<?= $expediente['evidencia_curso2'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_curso2">Fecha de finalización del curso:</label>
                <input type="date" name="fecha_curso2" class="form-control" value="<?= $expediente['fecha_curso2'] ?>">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="curso3">Curso 3:</label>
                <input type="text" name="curso3" class="form-control" value="<?= $expediente['curso3'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_curso3">Evidencia conclusión y aprobación del curso (PDF o imagen):</label>
                <input type="file" name="evidencia_curso3" accept=".pdf, image/*" value="<?= $expediente['evidencia_curso3'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_curso3">Fecha de finalización del curso:</label>
                <input type="date" name="fecha_curso3" class="form-control" value="<?= $expediente['fecha_curso3'] ?>">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="curso4">Curso 4:</label>
                <input type="text" name="curso4" class="form-control" value="<?= $expediente['curso4'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_curso4">Evidencia conclusión y aprobación del curso (PDF o imagen):</label>
                <input type="file" name="evidencia_curso4" accept=".pdf, image/*" value="<?= $expediente['evidencia_curso4'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_curso4">Fecha de finalización del curso:</label>
                <input type="date" name="fecha_curso4" class="form-control" value="<?= $expediente['fecha_curso4'] ?>">
            </div>
        </div>
    </article>


    <article class="mt-5 mb-3">
        <h2 class="">Ponencias en congresos, eventos académicos y simposios</h2>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="ponencia1">Ponencia 1:</label>
                <input type="text" name="ponencia1" class="form-control" value="<?= $expediente['ponencia1'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_ponencia1">Evidencia de la ponencia (PDF o imagen):</label>
                <input type="file" name="evidencia_ponencia1" accept=".pdf, image/*" value="<?= $expediente['evidencia_ponencia1'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_ponencia1">Fecha de la ponencia:</label>
                <input type="date" name="fecha_ponencia1" class="form-control" value="<?= $expediente['fecha_ponencia1'] ?>">
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-6">
                <label for="ponencia2">Ponencia 2:</label>
                <input type="text" name="ponencia2" class="form-control" value="<?= $expediente['ponencia2'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_ponencia2">Evidencia de la ponencia (PDF o imagen):</label>
                <input type="file" name="evidencia_ponencia2" accept=".pdf, image/*" value="<?= $expediente['evidencia_ponencia2'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_ponencia2">Fecha de la ponencia:</label>
                <input type="date" name="fecha_ponencia2" class="form-control" value="<?= $expediente['fecha_ponencia2'] ?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="ponencia3">Ponencia 3:</label>
                <input type="text" name="ponencia3" class="form-control" value="<?= $expediente['ponencia3'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_ponencia3">Evidencia de la ponencia (PDF o imagen):</label>
                <input type="file" name="evidencia_ponencia3" accept=".pdf, image/*" value="<?= $expediente['evidencia_ponencia3'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_ponencia3">Fecha de la ponencia:</label>
                <input type="date" name="fecha_ponencia3" class="form-control" value="<?= $expediente['fecha_ponencia3'] ?>">
            </div>
        </div>
    </article>



    <article class="mt-5 mb-3">
        <h2 class="">Certificaciones:</h2>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="certificacion1">Certificación 1:</label>
                <input type="text" name="certificacion1" class="form-control" value="<?= $expediente['certificacion1'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_cert1">Evidencia de la certificación (PDF o imagen):</label>
                <input type="file" name="evidencia_cert1" accept=".pdf, image/*" value="<?= $expediente['evidencia_cert1'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_certificacion1">Fecha de obtención de la certificación:</label>
                <input type="date" name="fecha_certificacion1" class="form-control" value="<?= $expediente['fecha_certificacion1'] ?>">
            </div>
        </div>


        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="certificacion2">Certificación 2:</label>
                <input type="text" name="certificacion2" class="form-control" value="<?= $expediente['certificacion2'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_cert2">Evidencia de la certificación (PDF o imagen):</label>
                <input type="file" name="evidencia_cert2" accept=".pdf, image/*" value="<?= $expediente['evidencia_cert2'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_certificacion2">Fecha de obtención de la certificación:</label>
                <input type="date" name="fecha_certificacion2" class="form-control" value="<?= $expediente['fecha_certificacion2'] ?>">
            </div>
        </div>


        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="certificacion3">Certificación 3:</label>
                <input type="text" name="certificacion3" class="form-control" value="<?= $expediente['certificacion3'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_cert3">Evidencia de la certificación (PDF o imagen):</label>
                <input type="file" name="evidencia_cert3" accept=".pdf, image/*" value="<?= $expediente['evidencia_cert3'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_certificacion3">Fecha de obtención de la certificación:</label>
                <input type="date" name="fecha_certificacion3" class="form-control" value="<?= $expediente['fecha_certificacion3'] ?>">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="certificacion4">Certificación 4:</label>
                <input type="text" name="certificacion4" class="form-control" value="<?= $expediente['certificacion4'] ?>">
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="evidencia_cert4">Evidencia de la certificación (PDF o imagen):</label>
                <input type="file" name="evidencia_cert4" accept=".pdf, image/*" value="<?= $expediente['evidencia_cert4'] ?>">
            </div> -->

            <div class="form-group col-md-6">
                <label for="fecha_certificacion4">Fecha de obtención de la certificación:</label>
                <input type="date" name="fecha_certificacion4" class="form-control" value="<?= $expediente['fecha_certificacion4'] ?>">
            </div>
        </div>
    </article>


    <article class="mb5">
        <h2 class="">Experiencia laboral adicional</h2>
        <div>
            <div class="form-group">
                <label for="">Indíque si tiene experiencia en otras áreas, asignaturas y/o carreras:</label>
                <textarea class="form-control" name="experiencia_adicional" id="" cols="30" rows="10"><?= $expediente['experiencia_adicional'] ?></textarea>
            </div>
        </div>
    </article>

    <div class="text-right mb-3">
        <button type="submit" class="btn btn-primary">Guardar</button>    
    </div>
    

</form>


<?= $this->endSection() ?>
