<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <div class="">
        <h2 class="mt-5">Registrar grupo</h2>


        <form class="mb-5" action="<?= base_url('admin/grupos'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="row mb-3">
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="clave">Clave del grupo:</label>
                        <input class="form-control" type="text" id="clave" name="clave" required>
                    </div>
                </div> -->


                <!-- Campo de clave generado -->
                <div class="form-group">
                    <label for="groupKey">Clave de Grupo:</label>
                    <input class="form-control" type="text" name="clave" id="clave">
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre del grupo:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" required>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Seleccionar periodo escolar:</label>
                        <select class="form-control" name="periodo_escolar" id="periodo_escolar">
                            <?php foreach($pescolares as $periodo): ?>
                                <option value="<?= $periodo['id'] ?>"><?= $periodo['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Seleccionar carrera:</label>
                        <select class="form-control" name="carrera" id="carrera">
                            <?php foreach ($carreras as $carrera): ?>
                            <option value="<?= $carrera['id'] ?>"><?= $carrera['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=""></label>
                        <select name="modalidad" id="" class="form-control">
                            <option value="semestre">Semestral</option>
                            <option value="modulo">Modular</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"></div>
                </div>
            </div>
            

            <div class="row mb-3 mt-5">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </div>
            </div>
            
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function generarClave() {

            var periodo_escolar = document.getElementById('periodo_escolar').value;
            var carrera = document.getElementById('carrera').value;
            var nombre = document.getElementById('nombre').value;

            // Genera la clave de grupo (ajusta la lógica según tus necesidades)
            var clave = nombre.substring(0,2) + periodo_escolar.substring(0, 4) + carrera.substring(0, 2);

            // Asigna la clave generada al campo de clave
            document.getElementById('clave').value = clave;
        }

        function fetchLocationData() {
            var locationId = $("#location").val();

            // Realizar la petición AJAX
            $.ajax({
                url: '/group/getLocationData',
                type: 'POST',
                data: { location_id: locationId },
                success: function(response) {
                    // Actualizar la interfaz de usuario con los datos de ubicación
                    $("#locationData").html("<p>Datos de Ubicación: " + response.name + "</p>");
                },
                error: function() {
                    console.log('Error al obtener datos de ubicación');
                }
            });
        }
    </script>



    <script>
        function generarClave() {

            var periodo_escolar = document.getElementById('periodo_escolar').value;
            var carrera = document.getElementById('carrera').value;
            var nombre = document.getElementById('nombre').value;

            var clave = nombre.substring(0,2) + periodo_escolar.substring(0, 4) + carrera.substring(0, 2);

            document.getElementById('clave').value = clave;
        }
    </script>



    <?= $this->endSection() ?>