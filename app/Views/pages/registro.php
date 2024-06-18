<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Edgar Degante Aguilar">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Horarios</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>

        .body{
            background-color: #f5f5f5;
        }

      .container {
  width: auto;
  max-width: 1000px;
  padding: 0 15px;
}

.footer {
  background-color: #f5f5f5;
}




      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="sticky-footer.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container text-center">
    <h1 class="mt-5">Sistema de programación de cargas académicas</h1>
    <p class="lead mt-5">UPN 212 Teziutlán</p>
    <img src="<?php echo base_url(''); ?>" alt="">
  </div>
</main>

<article class="container">

    <div class="text-center mb-3">
        <h2>Formulario de registro</h2>
        <p>Debe registrarse para tener su información disponible en el momento de asignar su carga académica.</p>
    </div>

    <div class="row">
        <div class="col col-md-2">
            
        </div>


        <div class="col-12 col-md-8 col-xs-12 col-sm-12">
            <form class="" action="<?= base_url('/registro') ?>" method="post" enctype="multipart/form-data">

                <div class="card-body">
                    <h4>Datos personales</h4>


                    <?php csrf_field(); ?>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Nombre:</label>
                                <input type="text" class="form-control" required 
                                       id="exampleInputBorderWidth2" name="nombre" placeholder="Ejemplo: Edgar">
                            </div>
                        </div>

                        

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Apellido Paterno:</label>
                                <input type="text" class="form-control" required
                                       id="exampleInputBorderWidth2" name="apaterno" placeholder="Ejemplo: Degante">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Apellido Materno:</label>
                                <input type="text" class="form-control" required
                                       id="exampleInputBorderWidth2" name="amaterno" placeholder="Ejemplo: Aguilar"
                                       minlength="3">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rfc">RFC:</label>
                                <input type="text" class="form-control" required
                                       id="exampleInputBorderWidth2" name="rfc"
                                       minlength="13" maxlength="13" required>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Sexo:</label>
                                <select class="form-control" name="sexo" id="">
                                    <option value="f">Femenino</option>
                                    <option value="m">Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Fecha de nacimiento:</label>
                                <input type="date" class="form-control" required
                                       id="exampleInputBorderWidth2" name="fechaNacimiento">
                            </div>
                        </div>

                    </div>


                        <h4 class="mt-5">Datos para inicio de sesión</h4>

                    <div class="row">
                        


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Nombre de usuario:</label>
                                <input type="text" class="form-control" required
                                       id="exampleInputBorderWidth2" name="username" placeholder="miusuario" minlength="5" maxlength="15">
                            </div>
                        </div>
                        
  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Contraseña:</label>
                                <input type="password" class="form-control" required
                                       id="exampleInputBorderWidth2" name="password" minlength="8" maxlength="20" 
                                       placeholder="Defina una contraseña">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Correo electrónico:</label>
                                <input type="email" class="form-control" required
                                       id="exampleInputBorderWidth2" name="email" placeholder="usuario@mail.com">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        <button type="reset" class="btn btn-default me-md-2">Restablecer campos</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>    
                    </div>
                    
                </div>


            </form>
        </div>


        <div class="col col-md-2"></div>
    </div>


</article>

<footer class="footer mt-auto py-3">
  <div class="container text-center">
    <span class="text-muted">Developed by edegantea for UPN212Teziutlán. 2023.</span>
  </div>
</footer>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.4/jquery.inputmask.min.js"></script>

<script>
    // Agregar la máscara al campo de entrada de teléfono
    $(document).ready(function() {
        $('#telefono').inputmask('(999) 999-9999');
    });
</script>


<script>
    // Agregar la máscara al campo de entrada de CURP
    $(document).ready(function() {
        $('#curp').inputmask('aaaA999999HAA999AA9', { placeholder: " " });
    });
</script>

</body>
</html>