<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Horario</title>
</head>
<body>

<h1>Asignar Horario para la Carrera: <?= $carrera['nombre']; ?></h1>

<form action="<?= site_url('coordinador/carrera-docente/guardar-asignacion-horario'); ?>" method="post">
    <!-- Campos del formulario -->
    <label for="docente">Docente:</label>
    <select name="docente" id="docente">
        <?php foreach ($docentes as $docente): ?>
            <option value="<?= $docente['id']; ?>"><?= $docente['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="asignatura">Asignatura:</label>
    <select name="asignatura" id="asignatura">
        <?php foreach ($asignaturas as $asignatura): ?>
            <option value="<?= $asignatura['id']; ?>"><?= $asignatura['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="hora_inicio">Hora de Inicio:</label>
    <input type="text" name="hora_inicio" id="hora_inicio">
    <br>
    <label for="hora_fin">Hora de Fin:</label>
    <input type="text" name="hora_fin" id="hora_fin">
    <br>
    <!-- Agrega más campos según sea necesario -->

    <button type="submit">Guardar Asignación de Horario</button>
</form>

<!-- Puedes incluir más contenido HTML según sea necesario -->

</body>
</html>