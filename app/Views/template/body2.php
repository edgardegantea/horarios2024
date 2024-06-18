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
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/css/sticky.css') ?>">


    <script nonce="b3e797ca-9650-4c43-bd50-bd4ef1bfea2d">(function(w,d){!function(t,u,v,w){t[v]=t[v]||{};t[v].executed=[];t.zaraz={deferred:[],listeners:[]};t.zaraz.q=[];t.zaraz._f=function(x){return async function(){var y=Array.prototype.slice.call(arguments);t.zaraz.q.push({m:x,a:y})}};for(const z of["track","set","debug"])t.zaraz[z]=t.zaraz._f(z);t.zaraz.init=()=>{var A=u.getElementsByTagName(w)[0],B=u.createElement(w),C=u.getElementsByTagName("title")[0];C&&(t[v].t=u.getElementsByTagName("title")[0].text);t[v].x=Math.random();t[v].w=t.screen.width;t[v].h=t.screen.height;t[v].j=t.innerHeight;t[v].e=t.innerWidth;t[v].l=t.location.href;t[v].r=u.referrer;t[v].k=t.screen.colorDepth;t[v].n=u.characterSet;t[v].o=(new Date).getTimezoneOffset();if(t.dataLayer)for(const G of Object.entries(Object.entries(dataLayer).reduce(((H,I)=>({...H[1],...I[1]})),{})))zaraz.set(G[0],G[1],{scope:"page"});t[v].q=[];for(;t.zaraz.q.length;){const J=t.zaraz.q.shift();t[v].q.push(J)}B.defer=!0;for(const K of[localStorage,sessionStorage])Object.keys(K||{}).filter((M=>M.startsWith("_zaraz_"))).forEach((L=>{try{t[v]["z_"+L.slice(7)]=JSON.parse(K.getItem(L))}catch{t[v]["z_"+L.slice(7)]=K.getItem(L)}}));B.referrerPolicy="origin";B.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(t[v])));A.parentNode.insertBefore(B,A)};["complete","interactive"].includes(u.readyState)?zaraz.init():t.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>
</head>

<body class="hold-transition dark-mode layout-fixed layout-navbar-fixed layout-footer-fixed">


    <div class="">



                <?= $this->renderSection('content') ?>


    </div>





        





<script src="<?php echo base_url('assets/adminlte/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/dashboard2.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/adminlte.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/overlay.js'); ?>"></script>
<!--<script src="--><?php //echo base_url('assets/adminlte/js/demo.js'); ?><!--"></script>-->

</body>
</html>
