<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
    .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.7);
}

.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    width: 50%;
}

.close {
    float: right;
    cursor: pointer;
}

</style>




<h1>Horarios</h1>


<!-- Botón para abrir el modal -->
<button class="btn btn-primary mb-3" id="btn-abrir-modal">Asignar horario a docente</button>
    <table id="calendario" class="table table-bordered tabe-justify table-stripped">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 8; $i <= 20; $i++) : ?>
                <tr>
                    <td><?= $i . ':00'; ?></td>
                    <td data-dia="lunes" data-hora="<?= $i ?>"></td>
                    <td data-dia="martes" data-hora="<?= $i ?>"></td>
                    <td data-dia="miércoles" data-hora="<?= $i ?>"></td>
                    <td data-dia="jueves" data-hora="<?= $i ?>"></td>
                    <td data-dia="viernes" data-hora="<?= $i ?>"></td>
                    <td data-dia="sábado" data-hora="<?= $i ?>"></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <hr>


    <table id="calendario" class="table table-bordered tabe-justify table-stripped">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($hora = 8; $hora <= 20; $hora++) : ?>
                <tr>
                    <td><?= $hora . ':00'; ?></td>
                    <?php for ($dia = 1; $dia <= 6; $dia++) : ?>
                        <td>
                            <?php foreach ($asignaciones as $asignacion) : ?>
                                <?php if ($asignacion['dia_semana'] == $dia && $asignacion['hora_inicio'] == $hora) : ?>
                                    <!-- Mostrar información de la asignación -->
                                    <!-- <?= $asignacion['nombre_asignatura']; ?><br> -->
                                    <?= $asignacion['nombre_docente']; ?><br>
                                    <?= $asignacion['nombre_carrera']; ?><br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    
    
    <!-- Modal para crear programaciones -->
    <div id="modal-asignacion" class="modal">
        <div class="modal-content">
            <!-- Formulario para capturar la asignación -->
            <form id="form-asignacion" method="post" action="<?= site_url('/admin/programacion/store'); ?>">
            <label for="materia_id">Asignatura</label>
        <select class="form-control" name="materia_id" required>
            <?php foreach ($asignaturas as $asignatura) : ?>
                <option value="<?= $asignatura['id']; ?>"><?= $asignatura['nombre']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <!-- <label for="docente_id">Docente</label>
        <select class="form-control" name="docente_id" required>
            <?php foreach ($docentes as $docente) : ?>
                <option value="<?= $docente['id']; ?>"><?= $docente['nombre']; ?></option>
            <?php endforeach; ?>
        </select><br> -->

        <label for="carrera_id">Carrera</label>
        <select class="form-control" name="carrera_id" required>
            <?php foreach ($carreras as $carrera) : ?>
                <option value="<?= $carrera['id']; ?>"><?= $carrera['nombre']; ?></option>
            <?php endforeach; ?>
        </select><br>

                <label for="hora_inicio">Hora de Inicio</label>
                <input class="form-control" type="time" name="hora_inicio" required><br>

                <label for="hora_fin">Hora de Fin</label>
                <input class="form-control" type="time" name="hora_fin" required><br>

                <label for="dia_semana">Día de la Semana</label>
            
                <select class="form-control" name="dia_semana" required>
                <option value="1">Lunes</option>
                <option value="2">Martes</option>
                <option value="3">Miércoles</option>
                <option value="4">Jueves</option>
                <option value="5">Viernes</option>
                <option value="6">Sábado</option>
                </select><br>


                <input class="btn btn-primary mt-3" type="submit" value="Guardar">
            </form>
        </div>
        <div class="modal-action">
            <button id="btn-cerrar-modal" class="btn btn-primary">Cancelar</button>
        </div>
    </div>









<hr>


<script>
        // JavaScript para mostrar las asignaciones en el calendario
        var asignaciones = <?= json_encode($asignaciones); ?>; // Datos de asignaciones recuperados del controlador

        // Recorre las asignaciones y muestra cada una en el calendario
        asignaciones.forEach(function(asignacion) {
            var dia = asignacion.dia_semana;
            var horaInicio = asignacion.hora_inicio;
            var horaFin = asignacion.hora_fin;
            var celda = document.querySelector(`#calendario tbody td[data-dia="${dia}"][data-hora="${horaInicio}"]`);
            
            if (celda) {
                celda.innerHTML = `<div class="asignacion">${asignacion.nombre_asignatura}<br>${asignacion.nombre_docente}</div>`;
                for (var i = horaInicio + 1; i <= horaFin; i++) {
                    celda = document.querySelector(`#calendario tbody td[data-dia="${dia}"][data-hora="${i}"]`);
                    if (celda) {
                        celda.style.display = 'none'; // Evitar duplicados
                    }
                }
            }
        });
    </script>



    <script>
        // JavaScript para abrir y cerrar el modal
        document.getElementById("btn-abrir-modal").addEventListener("click", function () {
            document.getElementById("modal-asignacion").style.display = "block";
        });

        document.getElementById("btn-cerrar-modal").addEventListener("click", function () {
            document.getElementById("modal-asignacion").style.display = "none";
        });
    </script>






<?= $this->endSection(); ?>