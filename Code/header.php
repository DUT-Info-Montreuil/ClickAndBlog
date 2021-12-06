<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- my CSS -->
    <link rel="stylesheet" href="public/style/styles.css">
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="public/style/bulma.min.css">
    <!-- icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
<?php
if (!isset($_SESSION['login'])){
echo '
<nav class="navbar is-light">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
              <div class="field is-grouped">
                <p class="control">
                    <a class="button is-light" href="index.php?module=mod_connexion">
              <span class="icon">
                <i class="fas fa-bars" style="color: #70a1ff"></i>
              </span>
                    </a>
                </p>
            </div>
        </a>
        <div class="navbar-burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu is-center" >
        <div class="navbar-start" >
            <div class="columns navbar-item">
              <div class="column">
              <a class="has-text-black">actualité</a>
              </div>
              <div class="column">
              <a class="has-text-black">sport</a>
              </div>
              <div class="column">
              <a class="has-text-black">politique</a>
              </div>
              <div class="column">
              <a class="has-text-black">santé</a>
              </div>
              <div class="column">
              <a class="has-text-black">technologie</a>
              </div>
            </div>
        </div>
    </div>



    <div class="navbar-end">
        <div class="navbar-item">
            <div class="field is-grouped">
                <p class="control">
                    <a class="button is-light" href="index.php?module=mod_connexion">
              <span class="icon">
                <i class="fas fa-user" style="color: #70a1ff"></i>
              </span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    </div>
</nav>
<div>
         <hr style="width:100%; margin:auto; color:black; background-color:#70a1ff; height:5px; opacity: 0.7;">
         <h1 style="text-align: center"> Click & Blog </h1>
         <hr style="width:100%; margin:auto; color:black; background-color:#70a1ff; height:5px; opacity: 0.7;">
</div>
';
} else {
echo '
<nav class="navbar is-light">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            Click & Blog
        </a>
        <div class="navbar-burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="navbar-menu is-center">
        <div class="navbar-start" id="categories">
            <div class="columns navbar-item">
              <div class="column">
              <a class="has-text-black">actualité</a>
              </div>
              <div class="column">
              <a class="has-text-black">sport</a>
              </div>
              <div class="column">
              <a class="has-text-black">politique</a>
              </div>
              <div class="column">
              <a class="has-text-black">santé</a>
              </div>
              <div class="column">
              <a class="has-text-black">technologie</a>
              </div>
            </div>
        </div>
    </div>

    <div class="navbar-end">
        <div class="navbar-item">
            <div class="field is-grouped">
                <p class="control">
                    <a class="button is-light" href="index.php?module=mod_connexion&action=deconnexion">
              <span class="icon">
                 <i class="fas fa-user"></i>
              </span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    </div>
</nav>


';
}