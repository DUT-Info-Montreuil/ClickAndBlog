<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bulma CSS -->
     <link rel="stylesheet" href="template/style/bulma.min.css">
    <!-- my CSS -->
    <link rel="stylesheet" href="template/style/styles.css?1" type="text/css">
    <!-- icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Jquery -->
    <script src="composants/Js/jquery.js"></script>
    <!-- JS -->
    <script defer src="scripts.js"></script>
</head>
<body>
<?php
require_once './composants/comp_profil/cont_profil.php';
$cont = new ContProfil();
$cont->affiche();