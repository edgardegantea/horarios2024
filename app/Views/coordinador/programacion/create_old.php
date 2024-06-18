<!-- app/Views/programacion/create.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Crear Programación</title>
</head>
<body>
    <h1>Crear Programación</h1>
    <form action="/programacion/store" method="post">
        <label for="materia_id">Asignatura</label>
        <select name="materia_id" required>
            <?php foreach ($asignaturas as $asignatura) : ?>
                <option value="<?= $asignatura['id']; ?>"><?= $asignatura['nombre']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="docente_id">Docente</label>
        <select name="docente_id" required>
            <?php foreach ($docentes as $docente) : ?>
                <option value="<?= $docente['id']; ?>"><?= $docente['nombre']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="carrera_id">Carrera</label>
        <select name="carrera_id" required>
            <?php foreach ($carreras as $carrera) : ?>
                <option value="<?= $carrera['id']; ?>"><?= $carrera['nombre']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="hora_inicio">Hora de Inicio</label>
        <input type="time" name="hora_inicio" required><br>

        <label for="hora_fin">Hora de Fin</label>
        <input type="time" name="hora_fin" required><br>

        <label for="día_semana">Día de la Semana</label>
        <input type="number" name="día_semana" required><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
