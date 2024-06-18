<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="p-5 bg-light">
        <h1>Restablecer contraseña</h1>

        <form action="<?= site_url('password/update-password') ?>" method="post">
            <?= csrf_field() ?>
            <label class="form-label">Ingrese su nueva contraseña</label>
            <input type="hidden" name="token" value="<?= $token ?>">
            <input class="form-control" type="password" name="password" placeholder="Ingrese nueva contraseña" required>
            <br>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Aceptar</button>
            </div>
        </form>

    </div>
</div>

</body>