<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>



<div>

    <h1>Calendario de Asignación</h1>
    <table class="table table-justify table-bordered">
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
        </tr>
        <?php
        $start_time = "08:00 AM";
        $end_time = "07:00 PM";

        while (strtotime($start_time) <= strtotime($end_time)) {
            echo "<tr>";
            echo "<td>$start_time - " . date("h:i A", strtotime('+1 hour', strtotime($start_time))) . "</td>";
            
            // Loop para cada día de la semana (Lunes a Sábado)
            for ($day = 1; $day <= 6; $day++) {
                // Aquí puedes colocar campos de formulario para asignar materias y docentes
                echo "<td>";
                echo "<input type='text' name='subject[$day][$start_time]' placeholder='Materia'>";
                echo "<input type='text' name='teacher[$day][$start_time]' placeholder='Docente'>";
                echo "</td>";
            }
            echo "</tr>";
            $start_time = date("h:i A", strtotime('+1 hour', strtotime($start_time)));
        }
        ?>
    </table>

</div>


<?= $this->endSection(); ?>