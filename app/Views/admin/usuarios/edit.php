<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>



    <h1>Editar información del usuario: <?= $usuario['username'] ?></h1>

    <?= \Config\Services::validation()->listErrors(); ?>

    <?= form_open("admin/usuarios/update/{$usuario['id']}"); ?>

    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Estatus del/la docente:</label>
                <select class="form-control" name="estatusDD" id="">
                    <option value="Docente de Asignatura">Docente de Asignatura</option>
                    <option value="Docente de Medio Tiempo">Docente de Medio Tiempo</option>
                    <option value="Docente de Tiempo Completo">Docente de Tiempo Completo</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <label for="">Condición:</label>
                <select class="form-control" name="condicion" id="">
                    <option value="VISITANTE">VISITANTE</option>
                    <option value="DE BASE">DE BASE</option>
                    <option value="INTERINO LIMITANTE">INTERINO LIMITANTE</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <label for="">Número de horas asignadas:</label>
                <input class="form-control" type="number" name="numHoras" id="" max="40" min="0" value="<?= $usuario['numHoras'] ?>">
            </div>
        </div>
    </div>

    <hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="rol">Rol:</label>
        <select class="form-control" name="rol">
            <option value="admin" <?= ($usuario['rol'] === 'admin') ? 'selected' : '' ?>>Administrador</option>
            <option value="coordinador" <?= ($usuario['rol'] === 'coordinador') ? 'selected' : '' ?>>Coordinador</option>
            <option value="docente" <?= ($usuario['rol'] === 'docente') ? 'selected' : '' ?>>Docente</option>
            <option value="alumno" <?= ($usuario['rol'] === 'alumno') ? 'selected' : '' ?>>Alumno</option>
        </select>
        </div>
        
    </div>


    <div class="col-md-4">
        <div class="form-group">
            <label for="username">Nombre de Usuario:</label>
            <input class="form-control" type="text" name="username" value="<?= $usuario['username'] ?>">
        </div>

    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input class="form-control" type="text" name="email" value="<?= $usuario['email'] ?>">
        </div>

    </div>


</div>

    <hr>


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input class="form-control" type="text" name="nombre" value="<?= $usuario['nombre'] ?>">
        </div>

    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="apaterno">Apellido Paterno:</label>
            <input class="form-control" type="text" name="apaterno" value="<?= $usuario['apaterno'] ?>">
        </div>

    </div>


    <div class="col-md-4">
        <div class="form-group">
            <label for="amaterno">Apellido Materno:</label>
            <input class="form-control" type="text" name="amaterno" value="<?= $usuario['amaterno'] ?>">
        </div>

    </div>
</div>




<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select class="form-control" name="sexo">
                <option value="m" <?= ($usuario['sexo'] === 'm') ? 'selected' : '' ?>>Masculino</option>
                <option value="f" <?= ($usuario['sexo'] === 'f') ? 'selected' : '' ?>>Femenino</option>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input class="form-control" type="date" name="fechaNacimiento" value="<?= $usuario['fechaNacimiento'] ?>">
        </div>

    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label class="text-danger" for="status">ESTADO DEL USUARIO:</label>
            <select class="form-control" name="status">
                <option value="activo" <?= ($usuario['status'] === 'activo') ? 'selected' : '' ?>>Activo</option>
                <option value="inactivo" <?= ($usuario['status'] === 'inactivo') ? 'selected' : '' ?>>Inactivo</option>
            </select>
        </div>

    </div>
</div>


    <div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Guardar Cambios">
        </div>
    </div>

    <?= form_close(); ?>

    <a href="/admin/usuarios">Volver a la lista de usuarios</a>

    

<?= $this->endSection(); ?>