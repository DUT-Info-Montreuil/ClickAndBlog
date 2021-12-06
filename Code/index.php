<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['login'])){
    echo '
    <nav class="navbar is-dark">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
        </a>
        <div class="navbar-burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="index.php">
                Home
            </a>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-dark" href="index.php?module=mod_connexion">
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
} else {
    echo '
        <nav class="navbar is-dark">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
        </a>
        <div class="navbar-burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="index.php">
                Home
            </a>
              <a class="navbar-item" href="index.php?module=mod_article&action=form">
        Article
      </a>
            </div>
            
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-dark" href="index.php?module=mod_connexion&action=deconnexion">
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
?>

<section class="container">
<?php
include_once 'connexion.php';
Connexion::initConnexion();
if(isset($_GET['module'])){
    switch ($_GET['module']){
        case "mod_article":
            include 'module/mod_article/mod_article.php';
            $main = new ModArticle();
            break;
        case "mod_connexion":
            include 'module/mod_connexion/mod_connexion.php';
            $main = new ModConnexion();
            break;
        default:
            echo "Erreur";
            break;
    }
} else {
    include 'module/mod_article/mod_article.php';
    $article = new ModArticle();
}
?>
</section>
</body>
</html>


