<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo/logoupnfavicon.png') ?>">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style {csp-style-nonce}>

        /* Estilos generales para centrar en pantalla */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Montserrat', serif;
            margin: 0;
            margin: 0;
            padding: 0;
            background-image: url(<?php echo base_url('assets/img/upnfoto1.jpg'); ?>);
            background-color: #23468c;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .login-container {
            width: 400px;
            padding: 20px;
            border: 1px solid rgba(200, 200, 200, 1);
            background-color: rgba(200, 200, 200, 1);
            border-radius: 5px;
            text-align: center;
        }

        .input-container {
            margin: 10px 0;
            text-align: left;
        }

        label {
            display: block;
        }

        input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn {
            width: 100%;
            border-radius: 0px;
        }


        .boton2 {
            width: 100%;
            padding: 10px;
            background-color: #ffffff;
            color: navy;
            border: none;
            border-radius: 0px;
            cursor: pointer;
        }

        .whatsapp-button {
            display: inline-block;
            background-color: #25d366; /* Color verde de WhatsApp */
            color: #0a58ca;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .whatsapp-icon {
            margin-right: 5px;
            color: #0a58ca;
        }
    </style>
</head>

<body class="text-center">
<div class="login-container">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


    <h2>Acceso</h2>
    <form action="<?= base_url('login'); ?>" method="post">
        <div class="input-container">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-container">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button class="btn btn-primary" type="submit">Iniciar sesión</button>
    </form>

    <div class="mt-5">
        <p>Si desea crear una cuenta de clic en</p>
        <a class="btn btn-light" href="<?php echo base_url('registro'); ?>">Registrarme</a>
    </div>


    <div class="mt-5">
        <p class="">Si olvidaste tu contraseña da clic en</p>
        <a class="btn btn-danger" href="<?= base_url('/password/request-reset'); ?>">Olvidé mi contraseña</a>
    </div>

    <?php $numero_whatsapp = '+522312051120'; ?>

    <div class="mt-5">
        En caso de presentar complicaciones para iniciar sesión, póngase en contacto con el desarrollador del sistema
        <br>
        <a class="btn btn-light"
           href="https://api.whatsapp.com/send?phone=<?php echo $numero_whatsapp; ?>&text=UPN-212Tez-HORARIOS"
           class="whatsapp-button">
            <i class="fab fa-whatsapp whatsapp-icon"></i> CONTACTAR
        </a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
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

</body>
</html>
