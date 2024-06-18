<?= $this->extend('template/bodyDocente') ?>

<?= $this->section('content') ?>


    <h1>Mi información</h1>

    
        <?php if (empty($docenteinfo)): ?>
            <a href="/docente/docenteinfo/create">Editar mi información</a>
            No hay información del docente
        <?php endif; ?>

        <?php foreach ($docenteinfo as $info): ?>

            

                <?= $info['id'] ?>
                <?= $info['calle'] . ' ' . $info['numInterior'] ?>
                


        <?php endforeach; ?>


</body>
</html>


<?= $this->endSection(); ?>