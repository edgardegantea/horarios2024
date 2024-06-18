<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="p-5 bg-light">

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <h1>Recuperar contraseña</h1>

        <form action="<?= site_url('password/send-reset-link') ?>" method="post">
            <?= csrf_field() ?>
            <label class="form-label">Ingrese su dirección de correo electrónico</label>
            <input class="form-control" type="email" name="email" placeholder="Ingrese su email" required>
            <br>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Enviar enlace de restablecimiento</button>
                <a class="btn btn-danger" href="<?= base_url('/login'); ?>">Cancelar</a>
            </div>
        </form>

        <div class="mt-5">
            Recibirá un token en su bandeja de correo electrónico.
            Favor de revisar su email para continuar con el proceso.
        </div>
    </div>
</div>

</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $(".alert").alert('close');
        }, 5000);
    });
</script>