<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo/logoupnfavicon.png') ?>">
    <title>Horarios | </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/adminlte.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/font.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/fonts2.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/overlay.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">


    <script nonce="b3e797ca-9650-4c43-bd50-bd4ef1bfea2d">(function(w,d){!function(t,u,v,w){t[v]=t[v]||{};t[v].executed=[];t.zaraz={deferred:[],listeners:[]};t.zaraz.q=[];t.zaraz._f=function(x){return async function(){var y=Array.prototype.slice.call(arguments);t.zaraz.q.push({m:x,a:y})}};for(const z of["track","set","debug"])t.zaraz[z]=t.zaraz._f(z);t.zaraz.init=()=>{var A=u.getElementsByTagName(w)[0],B=u.createElement(w),C=u.getElementsByTagName("title")[0];C&&(t[v].t=u.getElementsByTagName("title")[0].text);t[v].x=Math.random();t[v].w=t.screen.width;t[v].h=t.screen.height;t[v].j=t.innerHeight;t[v].e=t.innerWidth;t[v].l=t.location.href;t[v].r=u.referrer;t[v].k=t.screen.colorDepth;t[v].n=u.characterSet;t[v].o=(new Date).getTimezoneOffset();if(t.dataLayer)for(const G of Object.entries(Object.entries(dataLayer).reduce(((H,I)=>({...H[1],...I[1]})),{})))zaraz.set(G[0],G[1],{scope:"page"});t[v].q=[];for(;t.zaraz.q.length;){const J=t.zaraz.q.shift();t[v].q.push(J)}B.defer=!0;for(const K of[localStorage,sessionStorage])Object.keys(K||{}).filter((M=>M.startsWith("_zaraz_"))).forEach((L=>{try{t[v]["z_"+L.slice(7)]=JSON.parse(K.getItem(L))}catch{t[v]["z_"+L.slice(7)]=K.getItem(L)}}));B.referrerPolicy="origin";B.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(t[v])));A.parentNode.insertBefore(B,A)};["complete","interactive"].includes(u.readyState)?zaraz.init():t.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <!-- <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
    </div>



    <!-- INICIA NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #092171">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <!-- <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> -->
        </ul>

        <ul class="navbar-nav ml-auto">


            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"></i> <?= session()->get('nombre') ?>
                </a>
                
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog"></i> Configuraciones
                    </a>
                    <a href="<?= base_url('admin/perfil') ?>" class="dropdown-item">
                        <i class="fas fa-user"></i> Perfil
                    </a>
                    <a href="<?= base_url('logout'); ?>" class="dropdown-item">
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                    </a>
                </div>
            
            </li>

        </ul>
    </nav>
    <!-- FINALIZA NAVBAR -->


    <!-- INICIA ASIDE -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #092171">

        <a href="<?= base_url('admin') ?>" class="brand-link text-center" style="background-color: #092171">
            <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
            UPN 212 Teziutlán
            <span class="brand-text font-weight-light"></span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="background-color: #092171">
                <div class="image">
                    <!-- <img src="" class="img-circle elevation-2" alt="User Image"> -->
                </div>
                <div class="info text-center">
                    <a href="#" class="d-block"><?= session()->get('nombre') ?> <?= session()->get('apaterno') ?> <?= session()->get('amaterno') ?></a>
                </div>
            </div>

            <!-- <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div> -->

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <!-- <li class="nav-item menu-open">
                        <a href="<?= site_url('admin/horario'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-square-poll-horizontal"></i>
                            <p>
                                Horarios
                            </p>
                        </a>

                    </li> -->


                    <!-- <li class="nav-item menu-open">
                        <a href="<?= site_url('admin/programacion'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-square-poll-horizontal"></i>
                            <p>Programación</p>
                        </a>
                    </li>
                    -->


                    <li class="nav-item">
                        <a href="<?= site_url('admin/usuarios'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('admin/usuarios/ud'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Docentes</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('admin/asignaturas'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Asignaturas</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('admin/carreras'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-shapes"></i>
                            <p>Carreras</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('admin/grupos'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Grupos</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('admin/pescolares'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-shapes"></i>
                            <p>Periodos escolares</p>
                        </a>
                    </li>
                    

                </ul>
            </nav>

        </div>

    </aside>
    <!-- FINALIZA ASIDE -->


    <div class="content-wrapper">


        <section class="content">
            <div class="container-fluid">

                <?= $this->renderSection('content') ?>

            </div>
        </section>

    </div>


    <aside class="control-sidebar control-sidebar-dark">

    </aside>


    <footer class="main-footer">
        <strong>Developed by edegantea for <a href="http://upn212tez.info">UPN 212 Teziutlán</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            
        </div>
    </footer>
</div>


<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" class="init">
        $('#example').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-MX.json',
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
	</script>




    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>




<!-- <script src="<?php echo base_url('assets/adminlte/js/jquery.min.js'); ?>"></script> -->
<script src="<?php echo base_url('assets/adminlte/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/dashboard2.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/adminlte.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/overlay.js'); ?>"></script>
<!--<script src="--><?php //echo base_url('assets/adminlte/js/demo.js'); ?><!--"></script>-->

</body>
</html>
