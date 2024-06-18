<?php foreach ($asignaturas as $asignatura): ?>
    <option value="<?= $asignatura['id'] ?>"><?= $asignatura['nombre'] ?></option>
<?php endforeach; ?>