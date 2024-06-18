<?= $this->extend('template/bodyCoordinador') ?>

<?= $this->section('content') ?>



    <h1>Editar información del usuario: <?= $usuario['username'] ?></h1>

    <?= \Config\Services::validation()->listErrors(); ?>

    <?= form_open("coordinador/usuarios/update/{$usuario['id']}"); ?>

    <div>
        <div class="form-group">
            <label for="rol">Rol:</label>
        <select class="form-control" name="rol">
            <option value="docente" <?= ($usuario['rol'] === 'docente') ? 'selected' : '' ?>>Docente</option>
            <option value="alumno" <?= ($usuario['rol'] === 'alumno') ? 'selected' : '' ?>>Alumno</option>
        </select>
        </div>
        
    </div>

    <div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input class="form-control" type="text" name="nombre" value="<?= $usuario['nombre'] ?>">
        </div>
        
    </div>

    <div>
        <div class="form-group">
            <label for="apaterno">Apellido Paterno:</label>
            <input class="form-control" type="text" name="apaterno" value="<?= $usuario['apaterno'] ?>">
        </div>
        
    </div>

    <div>
        <div class="form-group">
            <label for="amaterno">Apellido Materno:</label>
            <input class="form-control" type="text" name="amaterno" value="<?= $usuario['amaterno'] ?>">
        </div>
        
    </div>

    <div>
        <div class="form-group">
            <label for="username">Nombre de Usuario:</label>
            <input class="form-control" type="text" name="username" value="<?= $usuario['username'] ?>">
        </div>
            
    </div>

    <div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input class="form-control" type="text" name="email" value="<?= $usuario['email'] ?>">
        </div>
            
    </div>

    <div>
        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select class="form-control" name="sexo">
                <option value="masculino" <?= ($usuario['sexo'] === 'masculino') ? 'selected' : '' ?>>Masculino</option>
                <option value="femenino" <?= ($usuario['sexo'] === 'femenino') ? 'selected' : '' ?>>Femenino</option>
            </select>
        </div>
    </div>

    <div>
        <div class="form-group">
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input class="form-control" type="date" name="fechaNacimiento" value="<?= $usuario['fechaNacimiento'] ?>">
        </div>
            
    </div>

    <div>
        <div class="form-group">
            <label for="status">Estatus:</label>
            <select class="form-control" name="status">
                <option value="activo" <?= ($usuario['status'] === 'activo') ? 'selected' : '' ?>>Activo</option>
                <option value="inactivo" <?= ($usuario['status'] === 'inactivo') ? 'selected' : '' ?>>Inactivo</option>
            </select>
        </div>
        
    </div>

    <div>
        <div class="form-group">
            <input type="submit" value="Guardar Cambios">
        </div>
    </div>

    <?= form_close(); ?>

    <a href="/admin/usuarios">Volver a la lista de usuarios</a>

    

<?= $this->endSection(); ?>